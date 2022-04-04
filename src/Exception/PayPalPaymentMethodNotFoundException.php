<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Exception;

final class PayPalPaymentMethodNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('PayPal payment method not found');
    }
}
