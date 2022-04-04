<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

interface AvailableCountriesProviderInterface
{
    /** @return string[] */
    public function provide(): array;
}
