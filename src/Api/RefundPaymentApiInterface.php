<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface RefundPaymentApiInterface
{
    public function refund(
        string $token,
        string $paymentId,
        string $payPalAuthAssertion,
        string $invoiceNumber,
        string $amount,
        string $currencyCode
    ): array;
}
