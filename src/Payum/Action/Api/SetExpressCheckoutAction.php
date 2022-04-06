<?php
namespace Onatera\SyliusBuyboxPlugin\Payum\Action\Api;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Exception\LogicException;
use Onatera\SyliusBuyboxPlugin\Payum\Api;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\SetExpressCheckout;

class SetExpressCheckoutAction implements ActionInterface, ApiAwareInterface
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
        /** @var $request SetExpressCheckout */
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());

        if (null === $model['PAYMENTREQUEST_0_AMT']) {
            throw new LogicException('The PAYMENTREQUEST_0_AMT must be set.');
        }

        $model->replace(
            $this->api->setExpressCheckout((array) $model)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof SetExpressCheckout &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
