<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface CompleteOrderApiInterface
{
    public function complete(string $token, string $orderId): array;
}
