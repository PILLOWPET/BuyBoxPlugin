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

namespace Onatera\SyliusBuyboxPlugin\Api;

use Onatera\SyliusBuyboxPlugin\Client\PayPalClientInterface;

final class CompleteOrderApi implements CompleteOrderApiInterface
{
    private PayPalClientInterface $client;

    public function __construct(PayPalClientInterface $client)
    {
        $this->client = $client;
    }

    public function complete(string $token, string $orderId): array
    {
        return $this->client->post(sprintf('v2/checkout/orders/%s/capture', $orderId), $token);
    }
}
