<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\BuyboxPlugin\Exception\PaymentNotFoundException;

interface PaymentProviderInterface
{
    /** @throws PaymentNotFoundException */
    public function getByPayPalOrderId(string $orderId): PaymentInterface;
}
