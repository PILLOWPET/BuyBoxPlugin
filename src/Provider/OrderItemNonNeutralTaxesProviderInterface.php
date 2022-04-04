<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

use Sylius\Component\Core\Model\OrderItemInterface;

interface OrderItemNonNeutralTaxesProviderInterface
{
    /** @return array|int[] */
    public function provide(OrderItemInterface $orderItem): iterable;
}
