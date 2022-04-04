<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Generator;

use Sylius\Component\Core\Model\PaymentMethodInterface;

interface PayPalAuthAssertionGeneratorInterface
{
    public function generate(PaymentMethodInterface $paymentMethod): string;
}
