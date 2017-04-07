<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

class OrderByManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManager';
}
