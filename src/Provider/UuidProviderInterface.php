<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

interface UuidProviderInterface
{
    public function provide(): string;
}
