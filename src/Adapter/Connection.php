<?php

declare(strict_types=1);

namespace Root\Adapter;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Connection
{
    public static function getEntityManager(): EntityManager
    {
        $params = [
            'driver' => 'pdo_mysql',
            'user' => 'alessandro',
            'password' => 'livre',
            'dbname' => 'iw_helpdesk',
        ];

        $paths = [
            dirname(__DIR__).'/Entity',
        ];

        $config = Setup::createAnnotationMetadataConfiguration($paths, true);

        return EntityManager::create($params, $config);
    }
}
