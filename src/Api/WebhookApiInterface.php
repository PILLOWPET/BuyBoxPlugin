<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Api;

interface WebhookApiInterface
{
    public function register(string $token, string $webhookUrl): array;
}
