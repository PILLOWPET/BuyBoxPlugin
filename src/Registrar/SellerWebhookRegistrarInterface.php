<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Registrar;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Onatera\SyliusBuyboxPlugin\Exception\PayPalWebhookUrlNotValidException;

interface SellerWebhookRegistrarInterface
{
    /** @throws PayPalWebhookUrlNotValidException */
    public function register(PaymentMethodInterface $paymentMethod): void;
}
