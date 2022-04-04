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

final class AuthorizeClientApi implements AuthorizeClientApiInterface
{
    private PayPalClientInterface $payPalClient;

    public function __construct(PayPalClientInterface $payPalClient)
    {
        $this->payPalClient = $payPalClient;
    }

    public function authorize(string $clientId, string $clientSecret): string
    {
        $content = $this->payPalClient->authorize($clientId, $clientSecret);

        return (string) $content['access_token'];
    }
}
