<?php

declare(strict_types=1);

namespace Root\Controller;

use Root\Adapter\Connection;
use Root\Entity\Department;
use Root\Validator\UserValidator;

final class UserController extends AbstractController
{
    public function profileAction(): void
    {
      $this->render('user/profile');
    }

    public function listAction(): void
    {
      $this->render('user/list');
    }

    public function addAction(): void
    {
      if (!$_POST) {
          $entityManager = Connection::getEntityManager();

          $departments = $entityManager
                ->getRepository(Department::class)
                ->findAll();

          $this->render('user/add', [
              'departments' => $departments,
          ]);
          return;
      }

      if (!UserValidator::validateUser($_POST)) {
          $this->render('user/add');
          return;
      }

      $user = new User($_POST['name'], $_POST['email'], $_POST['password']);
      $user->setDepartment($_POST['department']);
      $user->setType($_POST['type']);
    }
}
