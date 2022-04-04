<?php

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Downloader;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Onatera\SyliusBuyboxPlugin\Exception\PayPalReportDownloadException;
use Onatera\SyliusBuyboxPlugin\Model\Report;

interface PayoutsReportDownloaderInterface
{
    /**
     * @throws PayPalReportDownloadException
     */
    public function downloadFor(\DateTimeInterface $day, PaymentMethodInterface $paymentMethod): Report;
}
