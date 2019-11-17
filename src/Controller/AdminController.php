<?php

declare(strict_types=1);

namespace Root\Controller;

use Root\Security\PermissionSecurity;

final class AdminController extends AbstractController
{
   public function dashboardAction(): void
   {
       PermissionSecurity::isAdmin();

       $this->render('admin/dashboard');
   }
}
