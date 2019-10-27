<?php

declare(strict_types=1);

namespace Root\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @Entity()
 */
class Ticket
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
    private $title;

    /**
     * @Column(type="string")
     */
    private $type;

    /**
     * @Column(type="string")
     */
    private $description;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(referencedColumnName="id", name="author_id")
     */
    private $author;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(referencedColumnName="id", name="support_id")
     */
    private $support;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    public function getSupport(): ?User
    {
        return $this->support;
    }

    public function setSupport(User $support): void
    {
        $this->support = $support;
    }
}