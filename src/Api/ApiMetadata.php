<?php

declare(strict_types=1);

namespace PddSdk\Api;

final class ApiMetadata
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
        public readonly OfficialCategory $category,
        public readonly string $documentUrl,
    ) {}
}
