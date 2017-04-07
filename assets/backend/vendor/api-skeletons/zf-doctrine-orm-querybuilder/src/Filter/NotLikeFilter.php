<?php

namespace ZF\Doctrine\ORM\QueryBuilder\Filter;

use Doctrine\ORM\QueryBuilder;

class NotLikeFilter extends AbstractFilter
{
    public function filter(QueryBuilder $queryBuilder, $metadata, $option)
    {
        if (isset($option['where'])) {
            if ($option['where'] === 'and') {
                $queryType = 'andWhere';
            } elseif ($option['where'] === 'or') {
                $queryType = 'orWhere';
            }
        }

        if (! isset($queryType)) {
            $queryType = 'andWhere';
        }

        if (! isset($option['alias'])) {
            $option['alias'] = 'row';
        }

        $queryBuilder->$queryType(
            $queryBuilder
                ->expr()
                ->notlike(
                    $option['alias'] . '.' . $option['field'],
                    $queryBuilder->expr()->literal($option['value'])
                )
        );
    }
}
