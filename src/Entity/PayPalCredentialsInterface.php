<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Entity;

use Sylius\Component\Core\Model\PaymentMethodInterface;

interface PayPalCredentialsInterface
{
    public function paymentMethod(): PaymentMethodInterface;

    public function accessToken(): string;

    public function creationTime(): \DateTime;

    public function expirationTime(): \DateTime;

    public function isExpired(): bool;
}
