<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface AuthorizeClientApiInterface
{
    public function authorize(string $clientId, string $clientSecret): string;
}
