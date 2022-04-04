<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Provider;

use Sylius\Component\Core\Model\ChannelInterface;

interface PayPalConfigurationProviderInterface
{
    public function getClientId(ChannelInterface $channel): string;

    public function getPartnerAttributionId(ChannelInterface $channel): string;
}
