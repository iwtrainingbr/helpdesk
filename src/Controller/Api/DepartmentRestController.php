<?php

declare(strict_types=1);

namespace Root\Controller\Api;

use Root\Adapter\Connection;
use Root\Entity\Department;

final class DepartmentRestController
{
    private $entityManager;
    private $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager
            ->getRepository(Department::class);
    }

    public function getAction(): void
    {
        header('Content-Type: application/json');

        $departments = $this->repository->findAll();

        echo json_encode($departments);
    }
}