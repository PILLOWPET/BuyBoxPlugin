<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Processor;

interface LocaleProcessorInterface
{
    public function process(string $locale): string;
}
