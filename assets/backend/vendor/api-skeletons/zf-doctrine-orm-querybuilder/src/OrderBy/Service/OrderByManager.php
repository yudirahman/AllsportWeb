<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service;

use ZF\Doctrine\ORM\QueryBuilder\OrderBy\OrderByInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;
use Doctrine\ORM\QueryBuilder;

class OrderByManager extends AbstractPluginManager
{
    protected $invokableClasses = array();

    public function orderBy(QueryBuilder $queryBuilder, $metadata, $orderBy)
    {
        foreach ((array) $orderBy as $option) {
            if (! isset($option['type']) or ! $option['type']) {
                // @codeCoverageIgnoreStart
                throw new Exception\RuntimeException('Array element "type" is required for all orderby directives');
            }
            // @codeCoverageIgnoreEnd

            $instance = $this->get(strtolower($option['type']), array($this));
            $instance->setOrderByManager($this);

            $instance->orderBy($queryBuilder, $metadata, $option);
        }
    }

    /**
     * @param mixed $orderBy
     *
     * @return void
     * @throws Exception\RuntimeException
     */
    public function validatePlugin($orderBy)
    {
        if ($orderBy instanceof OrderByInterface) {
            return;
        }

        // @codeCoverageIgnoreStart
        throw new Exception\RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s\Plugin\PluginInterface',
            (is_object($orderBy) ? get_class($orderBy): gettype($orderBy)),
            __NAMESPACE__
        ));
        // @codeCoverageIgnoreEnd
    }
}
