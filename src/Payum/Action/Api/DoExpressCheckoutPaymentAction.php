<?php
namespace Onatera\SyliusBuyboxPlugin\Payum\Action\Api;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Exception\LogicException;
use Onatera\SyliusBuyboxPlugin\Payum\Api;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\DoExpressCheckoutPayment;

class DoExpressCheckoutPaymentAction implements ActionInterface, ApiAwareInterface
{
    use ApiAwareTrait;

    public function __construct()
    {
        $this->apiClass = Api::class;
    }

    /**
     * {@inheritDoc}
     */
    public function execute($request)
    {
        /** @var $request DoExpressCheckoutPayment */
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());

        if (null === $model['TOKEN']) {
            throw new LogicException('TOKEN must be set. Have you run SetExpressCheckoutAction?');
        }
        if (null === $model['PAYERID']) {
            throw new LogicException('PAYERID must be set. Has user authorized this transaction?');
        }
        if (null === $model['PAYMENTACTION']) {
            throw new LogicException('PAYMENTACTION must be set.');
        }
        if (null === $model['AMT']) {
            throw new LogicException('AMT must be set.');
        }

        $model->replace(
            $this->api->doExpressCheckoutPayment((array) $model)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof DoExpressCheckoutPayment &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
