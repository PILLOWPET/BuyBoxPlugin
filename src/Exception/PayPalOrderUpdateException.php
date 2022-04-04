<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Exception;

final class PayPalOrderUpdateException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Could not update PayPal order');
    }
}
