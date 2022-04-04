<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Exception;

final class PayPalWrongDataException extends \Exception
{
    public function __construct()
    {
        parent::__construct('PayPal data does not contain links to order');
    }
}
