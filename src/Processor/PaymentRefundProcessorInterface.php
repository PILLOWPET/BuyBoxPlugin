<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Processor;

use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\BuyboxPlugin\Exception\PayPalOrderRefundException;

interface PaymentRefundProcessorInterface
{
    /**
     * @throws PayPalOrderRefundException
     */
    public function refund(PaymentInterface $payment): void;
}
