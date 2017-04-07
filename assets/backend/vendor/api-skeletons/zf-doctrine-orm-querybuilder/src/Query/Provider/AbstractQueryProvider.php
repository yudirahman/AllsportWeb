<?php
/**
 * For zf-apigility-doctrine
 * Inherit query providers from this class and call
 *     $this->applyFiltersAndOrderBy($queryBuilder, $event, $entityClass, $parameters);
 * at the end of your query provider to apply filters and order by.
 */

namespace ZF\Doctrine\ORM\QueryBuilder\Query\Provider;

use ZF\Apigility\Doctrine\Server\Query\Provider\AbstractQueryProvider as ZFAbstractQueryProvider;
use ZF\Doctrine\ORM\QueryBuilder\Filter\Service\FilterManagerAwareInterface;
use ZF\Doctrine\ORM\QueryBuilder\Filter\Service\FilterManagerAwareTrait;
use ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManagerAwareInterface;
use ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManagerAwareTrait;
use Doctrine\ORM\QueryBuilder;
use ZF\Rest\ResourceEvent;

abstract class AbstractQueryProvider extends ZFAbstractQueryProvider implements
    FilterManagerAwareInterface,
    OrderByManagerAwareInterface
{
    use FilterManagerAwareTrait;
    use OrderByManagerAwareTrait;

    public function applyFiltersAndOrderBy(QueryBuilder $queryBuilder, ResourceEvent $event, $entityClass, $parameters)
    {
        $metadata = $this->getObjectManager()->getClassMetadata($entityClass);
        $query = $event->getRequest()->getQuery();

        $this->getFilterManager()->filter($queryBuilder, $metadata, $query['filter']);
        $this->getOrderByManager()->orderBy($queryBuilder, $metadata, $query['order-by']);
    }
}
