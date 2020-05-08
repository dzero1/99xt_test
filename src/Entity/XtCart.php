<?php

namespace App\Entity;

use App\Repository\XtCartRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=XtCartRepository::class)
 */
class XtCart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $book;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBook(): ?int
    {
        return $this->book;
    }

    public function setBook(int $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }
}
