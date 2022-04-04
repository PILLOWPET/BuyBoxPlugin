<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

use Sylius\Component\Core\Model\PaymentInterface;

interface UpdateOrderApiInterface
{
    public function update(
        string $token,
        string $orderId,
        PaymentInterface $payment,
        string $referenceId,
        string $merchantId
    ): array;
}
