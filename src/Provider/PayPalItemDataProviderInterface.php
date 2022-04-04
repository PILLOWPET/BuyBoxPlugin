<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

use Sylius\Component\Core\Model\OrderInterface;

interface PayPalItemDataProviderInterface
{
    public function provide(OrderInterface $order): array;
}
