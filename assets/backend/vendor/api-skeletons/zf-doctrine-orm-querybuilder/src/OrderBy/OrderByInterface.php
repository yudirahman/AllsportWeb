<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy;

use Doctrine\ORM\QueryBuilder;

interface OrderByInterface
{
    public function orderBy(QueryBuilder $queryBuilder, $metadata, $option);
}
