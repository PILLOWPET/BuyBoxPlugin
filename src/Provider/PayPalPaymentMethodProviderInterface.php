<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Onatera\SyliusBuyboxPlugin\Exception\PayPalPaymentMethodNotFoundException;

interface PayPalPaymentMethodProviderInterface
{
    /** @throws PayPalPaymentMethodNotFoundException */
    public function provide(): PaymentMethodInterface;
}
