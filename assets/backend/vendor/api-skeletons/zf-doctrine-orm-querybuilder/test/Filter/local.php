<?php

date_default_timezone_set('UTC');

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'configuration' => 'orm_default',
                'eventmanager'  => 'orm_default',
                'driverClass'   => 'Doctrine\DBAL\Driver\PDOSqlite\Driver',
                'params' => array(
                    'memory' => true,
                ),
            ),
            'odm_default' => array(
                'server' => 'localhost',
                'port' => '27017',
                'user' => '',
                'password' => '',
                'dbname' => 'zf_doctrine_querybuilder_filter_test',
            ),
        ),
    ),
    'zf-doctrine-orm-querybuilder-filter' => array(
        'invokables' => array(
            'eq' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\EqualsFilter',
            'neq' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\NotEqualsFilter',
            'lt' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\LessThanFilter',
            'lte' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\LessThanOrEqualsFilter',
            'gt' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\GreaterThanFilter',
            'gte' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\GreaterThanOrEqualsFilter',
            'isnull' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\IsNullFilter',
            'isnotnull' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\IsNotNullFilter',
            'in' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\InFilter',
            'notin' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\NotInFilter',
            'between' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\BetweenFilter',
            'like' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\LikeFilter',
            'notlike' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\NotLikeFilter',
            'ismemberof' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\IsMemberOfFilter',
            'orx' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\OrXFilter',
            'andx' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\AndXFilter',
            'innerjoin' => 'ZF\Doctrine\ORM\QueryBuilder\Filter\InnerJoinFilter',
        ),
    ),
);
