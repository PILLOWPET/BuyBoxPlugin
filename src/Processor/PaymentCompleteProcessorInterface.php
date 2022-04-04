<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Processor;

use Sylius\Component\Core\Model\PaymentInterface;

interface PaymentCompleteProcessorInterface
{
    public function completePayment(PaymentInterface $payment): void;
}
