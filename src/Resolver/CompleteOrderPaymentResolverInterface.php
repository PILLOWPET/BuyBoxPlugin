<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Resolver;

use Sylius\Component\Core\Model\PaymentInterface;

interface CompleteOrderPaymentResolverInterface
{
    public function resolve(PaymentInterface $payment, string $payPalOrderId): void;
}
