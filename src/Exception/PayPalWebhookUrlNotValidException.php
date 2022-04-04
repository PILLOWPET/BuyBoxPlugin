<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Exception;

final class PayPalWebhookUrlNotValidException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Url could not be verified by PayPal');
    }
}
