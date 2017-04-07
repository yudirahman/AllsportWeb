<?php

namespace ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service;

trait OrderByManagerAwareTrait
{
    protected $orderByManager;

    public function getOrderByManager()
    {
        return $this->orderByManager;
    }

    public function setOrderByManager(OrderByManager $orderByManager)
    {
        $this->orderByManager = $orderByManager;

        return $this;
    }
}
