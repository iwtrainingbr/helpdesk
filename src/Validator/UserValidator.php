<?php

declare(strict_types=1);

namespace Root\Validator;

final class UserValidator
{
  public static function validateUser(array $request): bool
  {
    $errors = [];

    if (strlen(trim($request['name'])) < 3) {
      $errors[] = 'Nome é obrigatório';
    }

    if (strlen(trim($request['email'])) < 6) {
      $errors[] = 'Email é obrigatório';
    }

    if (strlen(trim($request['password'])) < 8) {
      $errors[] = 'Senha tem que ter no mínimo 8 dígitos';
    }

    if (!empty($errors)) {
       $_SESSION['errors'] = $errors;
       return false;
    }

    return true;
  }
}
