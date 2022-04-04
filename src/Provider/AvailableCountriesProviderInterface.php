<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

interface AvailableCountriesProviderInterface
{
    /** @return string[] */
    public function provide(): array;
}
