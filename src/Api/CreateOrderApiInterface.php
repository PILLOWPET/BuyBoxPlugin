<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Api;

use Sylius\Component\Core\Model\PaymentInterface;

interface CreateOrderApiInterface
{
    public function create(string $token, PaymentInterface $payment, string $referenceId): array;
}
