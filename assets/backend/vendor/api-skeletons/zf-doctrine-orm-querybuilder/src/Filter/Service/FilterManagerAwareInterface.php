<?php

namespace ZF\Doctrine\ORM\QueryBuilder\Filter\Service;

interface FilterManagerAwareInterface
{
    public function getFilterManager();
    public function setFilterManager(FilterManager $filterManager);
}
