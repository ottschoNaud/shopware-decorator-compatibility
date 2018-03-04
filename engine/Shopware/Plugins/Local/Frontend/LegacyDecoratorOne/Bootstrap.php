<?php


class Shopware_Plugins_Frontend_LegacyDecoratorOne_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    public function install()
    {

        $this->subscribeEvent(
            'Enlight_Bootstrap_AfterInitResource_shopware_storefront.list_product_service',
            'decorateService'
        );

        return true;
    }

    public function afterInit()
    {
        $this->get('Loader')->registerNamespace('LegacyDecoratorOne', $this->Path());
    }

    public function decorateService()
    {
        $coreService  = Shopware()->Container()->get('shopware_storefront.list_product_service');
        $listProductService = new \LegacyDecoratorOne\StoreFrontBundle\ListProductService($coreService);
        Shopware()->Container()->set('shopware_storefront.list_product_service', $listProductService);
    }
}