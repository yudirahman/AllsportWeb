<?php

namespace ZF\Doctrine\ORM\QueryBuilder\Filter\Service;

trait FilterManagerAwareTrait
{
    protected $filterManager;

    public function getFilterManager()
    {
        return $this->filterManager;
    }

    public function setFilterManager(FilterManager $filterManager)
    {
        $this->filterManager = $filterManager;

        return $this;
    }
}
