<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'ZF\Doctrine\ORM\QueryBuilder\Filter\Service\FilterManager'
                => 'ZF\Doctrine\ORM\QueryBuilder\Filter\Service\FilterManagerFactory',
            'ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManager'
                => 'ZF\Doctrine\ORM\QueryBuilder\OrderBy\Service\OrderByManagerFactory',
        ),
    ),
);
