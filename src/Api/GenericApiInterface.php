<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface GenericApiInterface
{
    public function get(string $token, string $url): array;
}
