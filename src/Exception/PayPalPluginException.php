<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Exception;

final class BuyboxPluginException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Could not load data from PayPal');
    }
}
