<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Registrar;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Sylius\BuyboxPlugin\Exception\PayPalWebhookUrlNotValidException;

interface SellerWebhookRegistrarInterface
{
    /** @throws PayPalWebhookUrlNotValidException */
    public function register(PaymentMethodInterface $paymentMethod): void;
}
