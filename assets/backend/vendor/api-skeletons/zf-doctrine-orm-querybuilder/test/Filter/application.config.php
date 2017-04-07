<?php

return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'Db',
        'ZF\Doctrine\ORM\QueryBuilder',
    ),
    'module_listener_options' => array(
        'config_glob_paths' => array(
            __DIR__ . '/local.php',
        ),
        'module_paths' => array(
            __DIR__ . '/../vendor',
            'Db' => __DIR__ . '/module/Db',
            'ZF\Doctrine\ORM\QueryBuilder' => __DIR__ . '/../../',
        ),
    ),
);
