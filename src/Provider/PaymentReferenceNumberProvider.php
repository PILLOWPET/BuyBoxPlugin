<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\PaymentInterface;

final class PaymentReferenceNumberProvider implements PaymentReferenceNumberProviderInterface
{
    public function provide(PaymentInterface $payment): string
    {
        /** @var \DateTime $creationDate */
        $creationDate = $payment->getCreatedAt();

        return ((string) $payment->getId()) . '-' . $creationDate->format('d-m-Y');
    }
}
