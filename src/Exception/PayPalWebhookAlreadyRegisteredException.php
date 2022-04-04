<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Exception;

final class PayPalWebhookAlreadyRegisteredException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Webhook already registered!');
    }
}
