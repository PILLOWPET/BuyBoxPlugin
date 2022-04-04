<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

interface PayPalRefundDataProviderInterface
{
    public function provide(string $refundUrl): array;
}
