<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Exception;

final class BuyboxPluginException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Could not load data from PayPal');
    }
}
