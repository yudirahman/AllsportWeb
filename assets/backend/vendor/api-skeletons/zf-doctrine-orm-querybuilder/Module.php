<?php

namespace ZF\Doctrine\ORM\QueryBuilder;

use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\ModuleManager;

class Module implements DependencyIndicatorInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function init(ModuleManager $moduleManager)
    {
        $serviceManager  = $moduleManager->getEvent()->getParam('ServiceManager');
        $serviceListener = $serviceManager->get('ServiceListener');

        $serviceListener->addServiceManager(
            'ZF\Doctrine\ORM\QueryBuilder\Filter\Service\FilterManager',
            'zf-doctrine-orm-querybuilder-filter',
            'ZF\Doctrine\QueryBuilder\Filter\FilterInterface',
            'getDoctrineORMQueryBuilderFilterConfig'
        );

        $serviceListener->addServiceManager(
            'ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManager',
            'zf-doctrine-orm-querybuilder-orderby',
            'ZF\Doctrine\QueryBuilder\OrderBy\OrderByInterface',
            'getDoctrineORMQueryBuilderOrderByConfig'
        );
    }

    /**
     * Expected to return an array of modules on which the current one depends on
     *
     * @return array
     */
    public function getModuleDependencies()
    {
        return array('DoctrineModule', 'DoctrineORMModule');
    }
}
