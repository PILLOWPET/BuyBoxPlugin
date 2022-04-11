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

namespace Onatera\SyliusBuyboxPlugin\Payum\Factory;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;
use Onatera\SyliusBuyboxPlugin\Payum\Action\StatusAction;
use Onatera\SyliusBuyboxPlugin\Payum\Api;

final class BuyboxGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            'payum.factory_name' => 'sylius.buybox',
            'payum.factory_title' => 'Buybox',
            'payum.action.status' => new StatusAction(),
        ]);

        if (false == $config['payum.api']) {

            $config['payum.default_options'] = array(
                'username' => '',
                'password' => '',
                'signature' => '',
                'sandbox' => true,
            );
            $config->defaults($config['payum.default_options']);
            $config['payum.required_options'] = array('username', 'password', 'signature');

            $config['payum.api'] = function (ArrayObject $config) {
                $config->validateNotEmpty($config['payum.required_options']);

                $paypalConfig = array(
                    'username' => $config['username'],
                    'password' => $config['password'],
                    'signature' => $config['signature'],
                    'sandbox' => $config['sandbox'],
                    'local' => $config['local'],
                    'ngrokUrl' => $config['ngrokUrl'],
                    'localUrl' => $config['localUrl']
                );

                return new Api($paypalConfig, $config['payum.http_client'], $config['httplug.message_factory']);
            };
        };
    }
}
