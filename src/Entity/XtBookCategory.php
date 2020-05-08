<?php

namespace App\Entity;

use App\Repository\XtBookCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=XtBookCategoryRepository::class)
 */
class XtBookCategory
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
    private $book;

    /**
     * @ORM\Column(type="integer")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }
}
