<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\PaymentInterface;

interface PaymentReferenceNumberProviderInterface
{
    public function provide(PaymentInterface $payment): string;
}
