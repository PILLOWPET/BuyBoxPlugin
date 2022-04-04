<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Exception;

final class PaymentMethodCouldNotBeEnabledException extends \Exception
{
    public function __construct()
    {
        parent::__construct('PayPal payment method could not be enabled');
    }
}
