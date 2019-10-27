<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Root\Adapter\Connection;

include_once dirname(__DIR__).'/vendor/autoload.php';

$entityManager = Connection::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
