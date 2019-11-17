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
            'driver' => DATABASE_DRIVER,
            'user' => DATABASE_USER,
            'password' => DATABASE_PASSWORD,
            'dbname' => DATABASE_NAME,
        ];

        $paths = [
            dirname(__DIR__).'/Entity',
        ];

        $config = Setup::createAnnotationMetadataConfiguration($paths, true);

        return EntityManager::create($params, $config);
    }
}
