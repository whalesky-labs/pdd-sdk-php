<?php

declare(strict_types=1);
/**
 * This file is part of Pinduoduo Open Platform SDK for PHP.
 *
 * @link     https://github.com/whalesky-labs/pdd-sdk-php
 * @document https://github.com/whalesky-labs/pdd-sdk-php
 * @contact  westng
 * @license  https://github.com/whalesky-labs/pdd-sdk-php#license
 */
$context = stream_context_create(['ssl' => ['local_cert' => $argv[1], 'local_pk' => $argv[2]]]);
$server = stream_socket_server('tcp://127.0.0.1:0', $errno, $error, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $context);
if ($server === false) {
    exit(2);
}
echo stream_socket_get_name($server, false), "\n";
flush();
$socket = stream_socket_accept($server, 5);
if ($socket === false) {
    exit(3);
}
stream_set_timeout($socket, 3);
if (! @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_SERVER)) {
    exit(0); // Negative certificate verification tests intentionally abort TLS.
}
$request = '';
while (! str_contains($request, "\r\n\r\n")) {
    $part = fread($socket, 4096);
    if ($part === false || $part === '') {
        exit($argv[3] === 'tls-reject' ? 0 : 4);
    }
    $request .= $part;
}
if ($argv[3] === 'reject') {
    fwrite($socket, "HTTP/1.1 403 Forbidden\r\nContent-Length: 0\r\n\r\n");
    exit(0);
}
preg_match('/Sec-WebSocket-Key: (.+)\r\n/i', $request, $match);
$accept = base64_encode(sha1(trim($match[1]) . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));
fwrite($socket, "HTTP/1.1 101 Switching Protocols\r\nUpgrade: websocket\r\nConnection: Upgrade\r\nSec-WebSocket-Accept: $accept\r\n\r\n");
$send = static function (int $opcode, string $data, bool $finish = true) use ($socket): void {
    $size = strlen($data);
    fwrite($socket, chr(($finish ? 128 : 0) | $opcode) . ($size < 126 ? chr($size) : chr(126) . pack('n', $size)) . $data);
};
if ($argv[3] === 'timeout') {
    usleep(200000);
    $send(8, '');
    exit(0);
}
if ($argv[3] === 'binary') {
    $send(2, 'unsupported');
    fclose($socket);
    exit(0);
}
$send(1, '{"commandType":', false);
$send(9, 'probe');
$send(0, '"HeartBeat"}');
$opcodes = [];
$payloads = [];
while (count($opcodes) < 3) {
    $header = fread($socket, 2);
    if (strlen($header) !== 2) {
        break;
    }
    $opcode = ord($header[0]) & 15;
    $length = ord($header[1]) & 127;
    if (!(ord($header[1]) & 128) || $length > 125) {
        exit(5);
    }
    $mask = fread($socket, 4);
    $payload = '';
    while (strlen($payload) < $length) {
        $part = fread($socket, $length - strlen($payload));
        if ($part === '') {
            exit(6);
        }
        $payload .= $part;
    }
    for ($i = 0; $i < $length; ++$i) {
        $payload[$i] = $payload[$i] ^ $mask[$i % 4];
    }
    $opcodes[] = $opcode;
    $payloads[] = base64_encode($payload);
    if ($opcode === 8) {
        break;
    }
}
echo json_encode(['opcodes' => $opcodes, 'payloads' => $payloads], JSON_THROW_ON_ERROR), "\n";
fclose($socket);
fclose($server);
