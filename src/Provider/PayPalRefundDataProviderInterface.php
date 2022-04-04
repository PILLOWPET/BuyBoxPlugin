<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

interface PayPalRefundDataProviderInterface
{
    public function provide(string $refundUrl): array;
}
