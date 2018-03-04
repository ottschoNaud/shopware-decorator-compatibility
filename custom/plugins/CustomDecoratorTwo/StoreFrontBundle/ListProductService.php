<?php

namespace CustomDecoratorTwo\StoreFrontBundle;

use Shopware\Bundle\StoreFrontBundle\Service\ListProductServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Struct;

class ListProductService implements ListProductServiceInterface
{
    /**
     * @var ListProductServiceInterface
     */
    private $service;

    /**
     * @param ListProductServiceInterface $service
     */
    public function __construct(ListProductServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param array $numbers
     * @param Struct\ProductContextInterface $context
     * @return mixed
     */
    public function getList(array $numbers, Struct\ProductContextInterface $context)
    {
        var_dump('custom two');
        $products = $this->service->getList($numbers, $context);

        return $products;
    }

    /**
     * @param $number
     * @param Struct\ProductContextInterface $context
     * @return mixed
     */
    public function get($number, Struct\ProductContextInterface $context)
    {
        $product = $this->service->get($number, $context);

        return $product;
    }
}