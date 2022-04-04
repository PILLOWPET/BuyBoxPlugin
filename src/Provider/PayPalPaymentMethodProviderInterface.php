<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Sylius\BuyboxPlugin\Exception\PayPalPaymentMethodNotFoundException;

interface PayPalPaymentMethodProviderInterface
{
    /** @throws PayPalPaymentMethodNotFoundException */
    public function provide(): PaymentMethodInterface;
}
