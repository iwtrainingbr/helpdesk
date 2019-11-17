<?php

declare(strict_types=1);

namespace Root\Security;

use Root\Entity\User;

class PermissionSecurity
{
    public static function isAdmin(): void
    {
        if (
            !isset($_SESSION['user'])
            ||
            $_SESSION['user']->getType() !== User::TYPE_ADMIN
        ) {
            header('location: /');
        }
    }

    public static function isLogged(): void
    {
        if (!isset($_SESSION['user'])) {
            header('location: /');
        }
    }
}