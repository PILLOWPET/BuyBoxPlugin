<?php
namespace Onatera\SyliusBuyboxPlugin\Payum\Action;

use League\Uri\Http as HttpUri;
use League\Uri\UriModifier;
use Payum\Core\Action\ActionInterface;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayAwareInterface;
use Payum\Core\GatewayAwareTrait;
use Payum\Core\Request\Capture;
use Payum\Core\Request\GetHttpRequest;
use Payum\Core\Request\Sync;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Security\GenericTokenFactoryAwareInterface;
use Payum\Core\Security\GenericTokenFactoryAwareTrait;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\ConfirmOrder;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\SetExpressCheckout;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\AuthorizeToken;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\DoExpressCheckoutPayment;
use Onatera\SyliusBuyboxPlugin\Payum\Api;

abstract class PurchaseAction implements ActionInterface, GatewayAwareInterface, GenericTokenFactoryAwareInterface
{
    use GatewayAwareTrait;
    use GenericTokenFactoryAwareTrait;
    
    /**
     * {@inheritDoc}
     */
    public function execute($request)
    {
        /** @var $request Capture */
        RequestNotSupportedException::assertSupports($this, $request);

        $details = ArrayObject::ensureArrayObject($request->getModel());

        $details->validateNotEmpty('PAYMENTACTION');

        $details->defaults(array(
            'AUTHORIZE_TOKEN_USERACTION' => Api::USERACTION_COMMIT,
        ));

        $this->gateway->execute($httpRequest = new GetHttpRequest());
        if (isset($httpRequest->query['cancelled'])) {
            $details['CANCELLED'] = true;

            return;
        }

        if (isset($httpRequest->query['PayerID'])) {
            $details['PAYERID'] = $httpRequest->query['PayerID'];
        }

        if (false == $details['TOKEN']) {
            if (false == $details['RETURNURL'] && $request->getToken()) {
                $details['RETURNURL'] = $request->getToken()->getTargetUrl();
            }

            if (false == $details['CANCELURL'] && $request->getToken()) {
                $details['CANCELURL'] = $request->getToken()->getTargetUrl();
            }

            if ($details['CANCELURL']) {
                $cancelUri = HttpUri::createFromString($details['CANCELURL']);
                $cancelUri = UriModifier::mergeQuery($cancelUri, 'cancelled=1');

                $details['CANCELURL'] = (string) $cancelUri;
            }

            $this->gateway->execute(new SetExpressCheckout($details));

            if ($details['L_ERRORCODE0']) {
                return;
            }
        }

        if ($details['PAYERID'] && $details['AMT'] > 0) {
            $this->gateway->execute(new DoExpressCheckoutPayment($details));
        }

        if (false == $details['PAYERID']) {
            $this->gateway->execute(new AuthorizeToken($details));
        }

        $this->gateway->execute(new Sync($details));
    }
}
