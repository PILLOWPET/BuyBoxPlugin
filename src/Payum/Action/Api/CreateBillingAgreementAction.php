<?php
namespace Onatera\SyliusBuyboxPlugin\Payum\Action\Api;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Exception\LogicException;
use Onatera\SyliusBuyboxPlugin\Payum\Api;
use Onatera\SyliusBuyboxPlugin\Payum\Request\Api\CreateBillingAgreement;

class CreateBillingAgreementAction implements ActionInterface, ApiAwareInterface
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
        /** @var $request CreateBillingAgreement */
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());

        if (null === $model['TOKEN']) {
            throw new LogicException('TOKEN must be set. Have you run SetExpressCheckoutAction?');
        }

        $model->replace(
            $this->api->createBillingAgreement((array) $model)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof CreateBillingAgreement &&
            $request->getModel() instanceof \ArrayAccess
        ;
    }
}
