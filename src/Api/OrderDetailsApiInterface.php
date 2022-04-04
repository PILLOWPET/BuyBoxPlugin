<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Api;

interface OrderDetailsApiInterface
{
    public function get(string $token, string $orderId): array;
}
