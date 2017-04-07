<?php

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrderByManagerInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof OrderByManagerAwareInterface) {
            if (method_exists($serviceLocator, 'getServiceLocator')) {
                $serviceLocator = $serviceLocator->getServiceLocator();
            }

            $instance->setOrderByManager(
                $serviceLocator->get('ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManager')
            );
        }
    }
}
