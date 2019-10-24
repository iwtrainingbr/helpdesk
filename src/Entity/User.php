<?php

declare(strict_types=1);

namespace Root\Entity;

class User
{
  private $id;
  private $type;
  private $department;
  private $name;
  private $email;
  private $password;
  private $status;
  private $last_login;
  private $registered_at;
  private $updated_at;

  public function __construct(string $name, string $email, string $password)
  {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->status = true;
  }


}
