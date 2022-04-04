<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

use Sylius\Component\Core\Model\OrderInterface;
use Sylius\BuyboxPlugin\Exception\OrderNotFoundException;

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
