<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

interface UuidProviderInterface
{
    public function provide(): string;
}
