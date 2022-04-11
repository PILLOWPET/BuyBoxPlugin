<?php
namespace Onatera\SyliusBuyboxPlugin\Payum\Action;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Request\Capture;
use Payum\Core\Exception\RequestNotSupportedException;
use Onatera\SyliusBuyboxPlugin\Payum\Api;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\DoCapture;

class CaptureAction extends PurchaseAction
{
    /**
     * {@inheritDoc}
     */
    public function execute($request)
    {
        /** @var $request Capture */
        RequestNotSupportedException::assertSupports($this, $request);

        $details = ArrayObject::ensureArrayObject($request->getModel());

        $details['PAYMENTACTION'] = Api::PAYMENTACTION_SALE;

        foreach (range(0, 9) as $index) {
            if (Api::PENDINGREASON_AUTHORIZATION == $details['PAYMENTINFO_'.$index.'_PENDINGREASON']) {
                $details->defaults(['PAYMENTREQUEST_'.$index.'_COMPLETETYPE' => 'Complete']);

                $this->gateway->execute(new DoCapture($details, $index));
            }
        }

        parent::execute($request);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof Capture &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
