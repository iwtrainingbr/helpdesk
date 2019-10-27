<?php

declare(strict_types=1);

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @Entity()
 */
class User
{
    /**
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue()
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $type;

    /**
     * @ManyToOne(targetEntity="Department")
     * @JoinColumn(referencedColumnName="id", name="department_id")
     */
    private $department;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="string", unique=true)
     */
    private $email;

    /**
     * @Column(type="string")
     */
    private $password;

    /**
     * @Column(type="boolean")
     */
    private $status;

    /**
     * @Column(type="datetime")
     */
    private $last_login;

    /**
     * @Column(type="datetime")
     */
    private $registered_at;

    /**
     * @Column(type="datetime")
     */
    private $updated_at;

  public function __construct(string $name, string $email, string $password)
  {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->status = true;
  }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    public function getLastLogin(): \DateTime
    {
        return $this->last_login;
    }

    public function setLastLogin(\DateTime $last_login): void
    {
        $this->last_login = $last_login;
    }

    public function getRegisteredAt(): \DateTime
    {
        return $this->registered_at;
    }

    public function setRegisteredAt(\DateTime $registered_at): void
    {
        $this->registered_at = $registered_at;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}
