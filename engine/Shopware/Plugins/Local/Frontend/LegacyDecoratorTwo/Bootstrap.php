<?php


class Shopware_Plugins_Frontend_LegacyDecoratorTwo_Bootstrap extends Shopware_Components_Plugin_Bootstrap
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
        $this->get('Loader')->registerNamespace('LegacyDecoratorTwo', $this->Path());
    }

    public function decorateService()
    {
        $coreService  = Shopware()->Container()->get('shopware_storefront.list_product_service');
        $listProductService = new \LegacyDecoratorTwo\StoreFrontBundle\ListProductService($coreService);
        Shopware()->Container()->set('shopware_storefront.list_product_service', $listProductService);
    }
}