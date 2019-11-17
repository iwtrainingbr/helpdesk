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

    public function postAction(): void
    {
        $json = json_decode(file_get_contents('php://input'));

        if (!isset($json->name)) {
            echo json_encode([
                'erro' => 'Nome é obrigatorio',
            ]);
            return;
        }

        $department = new Department();
        $department->setName($json->name);
        $department->setDescription($json->description ?? '');

        $this->entityManager->persist($department);
        $this->entityManager->flush();

        echo json_encode($department);
    }

    public function putAction(): void
    {
        $json = json_decode(file_get_contents('php://input'));

        $id = $_GET['id'];

        $department = $this->repository->find($id);
        $department->setName($json->name);
        $department->setDescription($json->description);

        $this->entityManager->persist($department);
        $this->entityManager->flush();

        echo json_encode($department);
    }

    public function deleteAction(): void
    {
        $id = $_GET['id'];

        $department = $this->repository->find($id);

        $this->entityManager->remove($department);
        $this->entityManager->flush();

        echo json_encode([
            'success' => 'Departamento excluído',
        ]);
    }
}