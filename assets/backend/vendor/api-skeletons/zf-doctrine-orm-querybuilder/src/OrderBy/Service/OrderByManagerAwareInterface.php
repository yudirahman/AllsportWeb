<?php

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service;

interface OrderByManagerAwareInterface
{
    public function getOrderByManager();
    public function setOrderByManager(OrderByManager $ormOrderByManager);
}
