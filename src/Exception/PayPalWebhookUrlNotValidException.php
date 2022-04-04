<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Exception;

final class PayPalWebhookUrlNotValidException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Url could not be verified by PayPal');
    }
}
