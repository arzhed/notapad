<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoardRepository")
 */
class Board
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
    private $code;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="board_id", orphanRemoval=true)
     */
    private $note;

    public function __construct()
    {
        $this->note = new ArrayCollection();
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNote(): Collection
    {
        return $this->note;
    }

    public function addNote(Note $note): self
    {
        if (!$this->note->contains($note)) {
            $this->note[] = $note;
            $note->setBoxId($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->note->contains($note)) {
            $this->note->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getBoxId() === $this) {
                $note->setBoxId(null);
            }
        }

        return $this;
    }
}
