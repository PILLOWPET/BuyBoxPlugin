<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Enabler;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Onatera\SyliusBuyboxPlugin\Exception\PaymentMethodCouldNotBeEnabledException;

interface PaymentMethodEnablerInterface
{
    /**
     * @throws PaymentMethodCouldNotBeEnabledException
     */
    public function enable(PaymentMethodInterface $paymentMethod): void;
}
