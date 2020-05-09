<?php

namespace App\Entity;

use App\Repository\XtCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=XtCategoryRepository::class)
 */
class XtCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=XtBook::class, mappedBy="category")
     */
    private $xtBooks;

    public function __construct()
    {
        $this->xtBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|XtBook[]
     */
    public function getXtBooks(): Collection
    {
        return $this->xtBooks;
    }

    public function addXtBook(XtBook $xtBook): self
    {
        if (!$this->xtBooks->contains($xtBook)) {
            $this->xtBooks[] = $xtBook;
            $xtBook->addCategory($this);
        }

        return $this;
    }

    public function removeXtBook(XtBook $xtBook): self
    {
        if ($this->xtBooks->contains($xtBook)) {
            $this->xtBooks->removeElement($xtBook);
            $xtBook->removeCategory($this);
        }

        return $this;
    }
}
