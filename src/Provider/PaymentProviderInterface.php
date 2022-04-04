<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\PaymentInterface;
use Onatera\SyliusBuyboxPlugin\Exception\PaymentNotFoundException;

interface PaymentProviderInterface
{
    /** @throws PaymentNotFoundException */
    public function getByPayPalOrderId(string $orderId): PaymentInterface;
}
