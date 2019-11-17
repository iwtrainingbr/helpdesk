<?php

declare(strict_types=1);

namespace Root\Controller;

use Root\Adapter\Connection;
use Root\Entity\User;

final class IndexController extends AbstractController
{
  private $entityManager;
  private $userRepository;

  public function __construct()
  {
      $this->entityManager = Connection::getEntityManager();
      $this->userRepository = $this->entityManager->getRepository(User::class);
  }

  public function indexAction(): void
  {
      if (isset($_SESSION['user'])) {
          $type = strtolower($_SESSION['user']->getType());

          header('location: '.$type);
      }

      $this->render('index/index');
  }

  public function loginAction(): void
  {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->userRepository->findOneBy([
          'email' => $email,
      ]);

      if (!$user) {
          $_SESSION['errors'] = ['Usuário não encontrado'];
          $this->indexAction();
          return;
      }

      if (!password_verify($password, $user->getPassword())) {
          $_SESSION['errors'] = ['Senha Incorreta'];
          $this->indexAction();
          return;
      }

      $_SESSION['user'] = $user;

      header('location: /'.strtolower($user->getType()));
  }

  public function testeAction(): void
  {
      $this->render('index/teste');
  }

  public function notFoundAction(): void
  {
      $this->render('template/404');
  }

  public function logoutAction(): void
  {
      unset($_SESSION['user']);

      header('location: /');
  }
}
