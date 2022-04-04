<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface WebhookApiInterface
{
    public function register(string $token, string $webhookUrl): array;
}
