<?php

declare(strict_types=1);

namespace Root\Controller;

final class AdminController extends AbstractController
{
   public function dashboardAction(): void
   {
      $this->render('admin/dashboard');
   }
}
