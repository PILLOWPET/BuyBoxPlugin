<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Api;

use Sylius\Component\Core\Model\PaymentMethodInterface;

interface CacheAuthorizeClientApiInterface
{
    public function authorize(PaymentMethodInterface $paymentMethod): string;
}
