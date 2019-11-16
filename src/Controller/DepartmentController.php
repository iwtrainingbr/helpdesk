<?php

declare(strict_types=1);

namespace Root\Controller;

use Dompdf\Dompdf;
use Root\Adapter\Connection;
use Root\Entity\Department;

final class DepartmentController extends AbstractController
{
    private $repository;
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Department::class);
    }

    public function listAction(): void
    {
        $entityManager = Connection::getEntityManager();

        $departments = $entityManager
            ->getRepository(Department::class)
            ->findAll();
        $departments = $this->repository->findAll();

        $this->render('department/list', [
            'departments' => $departments,
        ]);
    }

    public function addAction(): void
    {
        if ($_POST) {
            $department = new Department();
            $department->setName($_POST['name']);
            $department->setDescription($_POST['description']);

            $this->entityManager->persist($department);
            $this->entityManager->flush();

            $_SESSION['success'] = ['Novo Departamento Criado'];
            $this->listAction();
        }

        $this->render('department/add');
    }

    public function removeAction(): void
    {
        $id = $_GET['id'];

        $department = $this->repository->find($id);

        $this->entityManager->remove($department);
        $this->entityManager->flush();

        $_SESSION['success'] = ['Departamento Excluido'];
        $this->listAction();
    }

    public function editAction(): void
    {
        $id = $_GET['id'];

        $department = $this->repository->find($id);

        if ($_POST) {
            $department->setName($_POST['name']);
            $department->setDescription($_POST['description']);

            $this->entityManager->persist($department);
            $this->entityManager->flush();

            $_SESSION['success'] = ['Departamento Editado'];
            $this->listAction();
            return;
        }

        $this->render('department/edit', [
            'department' => $department,
        ]);
    }

    public function pdfAction(): void
    {
        $departments = $this->repository->findAll();

        $html = include_once '../src/View/department/pdf.phtml';

        $date = date('dmYHis');

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("departments-{$date}.pdf", [
            'Attachment' => 0,
        ]);
    }
}

