<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Enabler;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Sylius\BuyboxPlugin\Exception\PaymentMethodCouldNotBeEnabledException;

interface PaymentMethodEnablerInterface
{
    /**
     * @throws PaymentMethodCouldNotBeEnabledException
     */
    public function enable(PaymentMethodInterface $paymentMethod): void;
}
