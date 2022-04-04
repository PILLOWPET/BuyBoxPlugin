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

final class BuyboxGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            'payum.factory_name' => 'buybox',
            'payum.factory_title' => 'Buybox',
            'payum.action.status' => new StatusAction(),
        ]);
    }
}
