<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\OrderItemInterface;

interface OrderItemNonNeutralTaxesProviderInterface
{
    /** @return array|int[] */
    public function provide(OrderItemInterface $orderItem): iterable;
}
