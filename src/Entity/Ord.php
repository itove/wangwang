<?php

namespace App\Entity;

use App\Repository\OrdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdRepository::class)]
class Ord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ords')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $consumer = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $note = null;

    #[ORM\OneToMany(mappedBy: 'ord', targetEntity: OrdItems::class)]
    private Collection $ordItems;

    public function __construct()
    {
        $this->ordItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConsumer(): ?User
    {
        return $this->consumer;
    }

    public function setConsumer(?User $consumer): static
    {
        $this->consumer = $consumer;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection<int, OrdItems>
     */
    public function getOrdItems(): Collection
    {
        return $this->ordItems;
    }

    public function addOrdItem(OrdItems $ordItem): static
    {
        if (!$this->ordItems->contains($ordItem)) {
            $this->ordItems->add($ordItem);
            $ordItem->setOrd($this);
        }

        return $this;
    }

    public function removeOrdItem(OrdItems $ordItem): static
    {
        if ($this->ordItems->removeElement($ordItem)) {
            // set the owning side to null (unless already changed)
            if ($ordItem->getOrd() === $this) {
                $ordItem->setOrd(null);
            }
        }

        return $this;
    }
}
