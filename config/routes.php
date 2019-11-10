<?php

declare(strict_types=1);

use Root\Controller\UserController;
use Root\Controller\AdminController;
use Root\Controller\IndexController;
use Root\Controller\DepartmentController;
use Root\Controller\TicketController;

function createRoute(string $controller, string $action): array
{
  return [
    'controller' => $controller,
    'action' => $action.'Action',
  ];
}

return [
  '/' => createRoute(IndexController::class, 'index'),
  '/admin' => createRoute(AdminController::class, 'dashboard'),
  '/meu-perfil' => createRoute(UserController::class, 'profile'),
  '/perfil' => createRoute(UserController::class, 'profile'),
  '/admin/usuarios' => createRoute(UserController::class, 'list'),
  '/admin/novo-usuario' => createRoute(UserController::class, 'add'),

  '/admin/departamentos' => createRoute(DepartmentController::class, 'list'),
  '/admin/excluir-departamento' => createRoute(DepartmentController::class, 'remove'),
  '/admin/editar-departamento' => createRoute(DepartmentController::class, 'edit'),
  '/admin/novo-departamento' => createRoute(DepartmentController::class, 'add'),
  '/admin/departamentos/pdf' => createRoute(DepartmentController::class, 'pdf'),

  '/abrir-chamado' => createRoute(TicketController::class, 'add'),
  '/suporte/chamados' => createRoute(TicketController::class, 'list'),
];
