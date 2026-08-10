<?php

declare(strict_types=1);

namespace PddSdk\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PddSdk\Auth\OAuthClient;
use PddSdk\Client\Pipeline\RequestFactory;
use PddSdk\Client\Pipeline\ResponseParser;
use PddSdk\Config\Config;
use PddSdk\Generated\ApiClientMethods;
use PddSdk\Transport\GuzzleTransport;
use PddSdk\Transport\TransportInterface;

final class PddClient
{
    use ApiClientMethods;

    private const SUPPORTED_OPTIONS = [
        'accessToken',
        'autoDetectRuntime',
        'baseUrl',
        'connectTimeout',
        'ddkAuthorizeUrl',
        'merchantAuthorizeUrl',
        'mobileAuthorizeUrl',
        'readTimeout',
        'tokenUrl',
        'userAgent',
    ];

    private readonly Config $config;
    private readonly TransportInterface $transport;
    private readonly RequestFactory $requestFactory;
    private readonly ResponseParser $responseParser;
    private readonly OAuthClient $oauthClient;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        array $options = [],
        ?TransportInterface $transport = null,
        ?ClientInterface $httpClient = null,
        ?RequestFactory $requestFactory = null,
        ?ResponseParser $responseParser = null,
    ) {
        $unsupportedOptions = array_diff(array_keys($options), self::SUPPORTED_OPTIONS);
        if ($unsupportedOptions !== []) {
            throw new \PddSdk\Exception\ValidationException(sprintf(
                'Unsupported client option(s): %s.',
                implode(', ', $unsupportedOptions),
            ));
        }

        $this->config = Config::fromArray([
            ...$options,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);
        $this->responseParser = $responseParser ?? new ResponseParser();
        $this->transport = $transport ?? new GuzzleTransport($httpClient ?? new Client(), $this->config);
        $this->requestFactory = $requestFactory ?? new RequestFactory($this->config);
        $this->oauthClient = new OAuthClient($this->config, $this->transport, $this->responseParser);
    }

    public function config(): Config
    {
        return $this->config;
    }

    public function oauth(): OAuthClient
    {
        return $this->oauthClient;
    }

    /**
     * @param array<string, mixed> $parameters
     *
     * @return array<string, mixed>
     */
    public function rawRequest(
        string $type,
        array $parameters = [],
        ?string $accessToken = null,
        string $version = 'V1',
        string $dataType = 'JSON',
    ): array {
        $payload = $this->requestFactory->build($type, $parameters, $accessToken, $version, $dataType);
        $response = $this->transport->send('POST', $this->config->baseUrl(), [
            'form_params' => $payload,
        ]);

        return $this->responseParser->parse($response['status'], $response['body']);
    }

    /**
     * @param class-string<RpcRequest> $requestClass
     */
    public function createPendingRequest(string $requestClass): PendingRequest
    {
        return new PendingRequest(new $requestClass($this));
    }
}
