<?php

declare(strict_types=1);

namespace Root\Controller;

use Root\Adapter\Connection;
use Root\Entity\Department;
use Root\Entity\User;
use Root\Security\PermissionSecurity;
use Root\Validator\UserValidator;

final class UserController extends AbstractController
{
    private $entityManager;
    private $departmentRepository;
    private $userRepository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();

        $this->departmentRepository = $this->entityManager->getRepository(Department::class);
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function profileAction(): void
    {
      PermissionSecurity::isLogged();

      $this->render('user/profile');
    }

    public function listAction(): void
    {
        PermissionSecurity::isAdmin();

        $users = $this->userRepository->findAll();

        $this->render('user/list', [
            'users' => $users,
        ]);
    }

    public function addAction(): void
    {
      PermissionSecurity::isAdmin();

      if (!$_POST) {
          $departments = $this->departmentRepository->findAll();

          $this->render('user/add', [
              'departments' => $departments,
          ]);
          return;
      }

      if (!UserValidator::validateUser($_POST)) {
          $this->render('user/add');
          return;
      }

      $department = $this->departmentRepository->find($_POST['department']);

      $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

      $user = new User($_POST['name'], $_POST['email'], $password);
      $user->setDepartment($department);
      $user->setType($_POST['type']);

      $this->entityManager->persist($user);
      $this->entityManager->flush();

      $_SESSION['success'] = ['Novo usuário criado'];

      $this->listAction();
    }
}
