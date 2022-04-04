<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Provider;

use Ramsey\Uuid\Uuid;

final class UuidProvider implements UuidProviderInterface
{
    public function provide(): string
    {
        return Uuid::uuid4()->toString();
    }
}
