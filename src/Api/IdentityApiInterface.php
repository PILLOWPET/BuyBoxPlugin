<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

interface IdentityApiInterface
{
    public function generateToken(string $token): string;
}
