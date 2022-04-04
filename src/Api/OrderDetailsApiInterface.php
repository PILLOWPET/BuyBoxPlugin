<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface OrderDetailsApiInterface
{
    public function get(string $token, string $orderId): array;
}
