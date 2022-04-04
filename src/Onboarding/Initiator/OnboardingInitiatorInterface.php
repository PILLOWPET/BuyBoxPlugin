<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Onboarding\Initiator;

use Sylius\Component\Core\Model\PaymentMethodInterface;

interface OnboardingInitiatorInterface
{
    /**
     * @return string Redirection URL to PayPal
     */
    public function initiate(PaymentMethodInterface $paymentMethod): string;

    public function supports(PaymentMethodInterface $paymentMethod): bool;
}
