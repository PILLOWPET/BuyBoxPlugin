<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Api;

interface IdentityApiInterface
{
    public function generateToken(string $token): string;
}
