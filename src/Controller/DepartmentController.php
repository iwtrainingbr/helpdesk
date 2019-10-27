<?php

declare(strict_types=1);

namespace Root\Controller;

use Root\Adapter\Connection;
use Root\Entity\Department;

final class DepartmentController extends AbstractController
{
    public function listAction(): void
    {
        $entityManager = Connection::getEntityManager();

        $departments = $entityManager
            ->getRepository(Department::class)
            ->findAll();

        $this->render('department/list', [
            'departments' => $departments,
        ]);
    }

    public function addAction(): void
    {
        $this->render('department/add');
    }
}
