<?php

declare(strict_types=1);

namespace Root\Controller;

use Root\Security\PermissionSecurity;

final class TicketController extends AbstractController
{
    public function addAction(): void
    {
        PermissionSecurity::isLogged();

        $this->render('ticket/add');
    }

    public function listAction(): void
    {
        PermissionSecurity::isLogged();

        $this->render('ticket/list');
    }
}
