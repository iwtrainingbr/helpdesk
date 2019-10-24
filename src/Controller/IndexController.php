<?php

declare(strict_types=1);

namespace Root\Controller;

final class IndexController extends AbstractController
{
  public function indexAction(): void
  {
      $this->render('index/index');
  }

  public function testeAction(): void
  {
      $this->render('index/teste');
  }

  public function notFoundAction(): void
  {
      $this->render('template/404');
  }
}
