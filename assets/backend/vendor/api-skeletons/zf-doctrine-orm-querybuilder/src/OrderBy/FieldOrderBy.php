<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy;

use Doctrine\ORM\QueryBuilder;
use Exception;

class FieldOrderBy extends AbstractOrderBy
{
    public function orderBy(QueryBuilder $queryBuilder, $metadata, $option)
    {
        if (! isset($option['alias'])) {
            $option['alias'] = 'row';
        }

        if (! isset($option['direction']) || ! in_array(strtolower($option['direction']), array('asc', 'desc'))) {
            throw new Exception('Invalid direction in Field OrderBy');
        }

        $queryBuilder->addOrderBy($option['alias'] . '.' . $option['field'], $option['direction']);
    }
}
