<?php

namespace ZF\Doctrine\ORM\QueryBuilder\Filter\Service;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FilterManagerInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof FilterManagerAwareInterface) {
            if (method_exists($serviceLocator, 'getServiceLocator')) {
                $serviceLocator = $serviceLocator->getServiceLocator();
            }

            $instance->setFilterManager(
                $serviceLocator->get('ZF\Doctrine\ORM\QueryBuilder\Filter\Service\FilterManager')
            );
        }
    }
}
