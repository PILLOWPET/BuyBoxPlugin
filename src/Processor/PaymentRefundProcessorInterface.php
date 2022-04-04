<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Processor;

use Sylius\Component\Core\Model\PaymentInterface;
use Onatera\SyliusBuyboxPlugin\Exception\PayPalOrderRefundException;

interface PaymentRefundProcessorInterface
{
    /**
     * @throws PayPalOrderRefundException
     */
    public function refund(PaymentInterface $payment): void;
}
