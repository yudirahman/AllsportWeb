<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy;

use DateTime;
use ZF\Doctrine\ORM\QueryBuilder\OrderBy\OrderByInterface;
use ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\ORMOrderByManager;
use ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManagerAwareInterface;
use ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManagerAwareTrait;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractOrderBy implements
    OrderByInterface,
    OrderByManagerAwareInterface
{
    use OrderByManagerAwareTrait;

    abstract public function orderBy(QueryBuilder $queryBuilder, $metadata, $option);
}
