<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Onatera\SyliusBuyboxPlugin\Api;

use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use Onatera\SyliusBuyboxPlugin\Client\PayPalClientInterface;
use Onatera\SyliusBuyboxPlugin\Model\PayPalPurchaseUnit;
use Onatera\SyliusBuyboxPlugin\Provider\PaymentReferenceNumberProviderInterface;
use Onatera\SyliusBuyboxPlugin\Provider\PayPalItemDataProviderInterface;

final class UpdateOrderApi implements UpdateOrderApiInterface
{
    private PayPalClientInterface $client;

    private PaymentReferenceNumberProviderInterface $paymentReferenceNumberProvider;

    private PayPalItemDataProviderInterface $payPalItemsDataProvider;

    public function __construct(
        PayPalClientInterface $client,
        PaymentReferenceNumberProviderInterface $paymentReferenceNumberProvider,
        PayPalItemDataProviderInterface $payPalItemsDataProvider
    ) {
        $this->client = $client;
        $this->paymentReferenceNumberProvider = $paymentReferenceNumberProvider;
        $this->payPalItemsDataProvider = $payPalItemsDataProvider;
    }

    public function update(
        string $token,
        string $orderId,
        PaymentInterface $payment,
        string $referenceId,
        string $merchantId
    ): array {
        /** @var OrderInterface $order */
        $order = $payment->getOrder();
        /** @var AddressInterface $address */
        $address = $order->getShippingAddress();

        $payPalItemData = $this->payPalItemsDataProvider->provide($order);

        $data = new PayPalPurchaseUnit(
            $referenceId,
            $this->paymentReferenceNumberProvider->provide($payment),
            (string) $order->getCurrencyCode(),
            (int) $payment->getAmount(),
            $order->getShippingTotal(),
            (float) $payPalItemData['total_item_value'],
            (float) $payPalItemData['total_tax'],
            $order->getOrderPromotionTotal(),
            $merchantId,
            (array) $payPalItemData['items'],
            $order->isShippingRequired(),
            $order->getShippingAddress()
        );

        return $this->client->patch(
            sprintf('v2/checkout/orders/%s', $orderId),
            $token,
            [
                [
                    'op' => 'replace',
                    'path' => sprintf('/purchase_units/@reference_id==\'%s\'', $referenceId),
                    'value' => $data->toArray(),
                ],
            ]
        );
    }
}
