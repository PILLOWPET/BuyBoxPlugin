<?php
namespace Onatera\SyliusBuyboxPlugin\Payum\Action;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Request\Authorize;
use Payum\Core\Request\Capture;
use Payum\Core\Exception\RequestNotSupportedException;
use Onatera\SyliusBuyboxPlugin\Payum\Api;

class AuthorizeAction extends PurchaseAction
{
    /**
     * {@inheritDoc}
     */
    public function execute($request)
    {
        /** @var $request Capture */
        RequestNotSupportedException::assertSupports($this, $request);

        $details = ArrayObject::ensureArrayObject($request->getModel());

        $details['PAYMENTREQUEST_0_PAYMENTACTION'] = Api::PAYMENTACTION_AUTHORIZATION;

        parent::execute($request);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof Authorize &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
