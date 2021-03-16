<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=RaceAttribute::class, mappedBy="race", fetch="EAGER", cascade={"all"}, orphanRemoval=true)
     */
    private $raceAttribute;

    /**
     * @ORM\OneToOne(targetEntity=RacialBonus::class, mappedBy="race", cascade={"persist", "remove"})
     */
    private $racialBonus;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function __construct()
    {
        $this->raceAttribute = new ArrayCollection();
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

    /**
     * @return Collection|RaceAttribute[]
     */
    public function getRaceAttribute(): Collection
    {
        return $this->raceAttribute;
    }

    public function addRaceAttribute(RaceAttribute $raceAttribute): self
    {
        if (!$this->raceAttribute->contains($raceAttribute)) {
            $this->raceAttribute[] = $raceAttribute;
            $raceAttribute->setRaceId($this);
        }

        return $this;
    }

    public function removeAttribute(RaceAttribute $raceAttribute): self
    {
        if ($this->raceAttribute->removeElement($raceAttribute)) {
            // set the owning side to null (unless already changed)
            if ($raceAttribute->getRaceId() === $this) {
                $raceAttribute->setRaceId(null);
            }
        }

        return $this;
    }

    public function getRacialBonus(): ?RacialBonus
    {
        return $this->racialBonus;
    }

    public function setRacialBonus(RacialBonus $racialBonus): self
    {
        // set the owning side of the relation if necessary
        if ($racialBonus->getRaceId() !== $this) {
            $racialBonus->setRaceId($this);
        }

        $this->racialBonus = $racialBonus;

        return $this;
    }

    public function toArray()
    {
        $objects = $this->getRaceAttribute();
        $attributes = [];
        foreach($objects as $attribute) {
            $attributes[] = $attribute->toArray();
        }
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'attributes' => $attributes,
            'racial_bonus' => $this->getRacialBonus()->toArray()
                ];
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
