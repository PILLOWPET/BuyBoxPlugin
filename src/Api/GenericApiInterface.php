<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Api;

interface GenericApiInterface
{
    public function get(string $token, string $url): array;
}
