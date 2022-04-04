<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\OrderInterface;
use Onatera\SyliusBuyboxPlugin\Exception\OrderNotFoundException;

interface OrderProviderInterface
{
    /**
     * @throws OrderNotFoundException
     */
    public function provideOrderById(int $id): OrderInterface;

    /**
     * @throws OrderNotFoundException
     */
    public function provideOrderByToken(string $token): OrderInterface;
}
