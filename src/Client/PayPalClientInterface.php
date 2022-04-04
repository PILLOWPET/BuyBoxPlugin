<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Client;

use Onatera\SyliusBuyboxPlugin\Exception\PayPalAuthorizationException;

interface PayPalClientInterface
{
    /** @throws PayPalAuthorizationException */
    public function authorize(string $clientId, string $clientSecret): array;

    public function get(string $url, string $token): array;

    public function post(string $url, string $token, array $data = null, array $extraHeaders = []): array;

    public function patch(string $url, string $token, array $data = null): array;
}
