<?php

declare(strict_types=1);

namespace Sylius\BuyboxPlugin\Downloader;

use Sylius\Component\Core\Model\PaymentMethodInterface;
use Sylius\BuyboxPlugin\Exception\PayPalReportDownloadException;
use Sylius\BuyboxPlugin\Model\Report;

interface PayoutsReportDownloaderInterface
{
    /**
     * @throws PayPalReportDownloadException
     */
    public function downloadFor(\DateTimeInterface $day, PaymentMethodInterface $paymentMethod): Report;
}
