<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\OrderInterface;

interface PayPalItemDataProviderInterface
{
    public function provide(OrderInterface $order): array;
}
