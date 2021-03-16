<?php

namespace App\Entity;

use App\Repository\RacialBonusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RacialBonusRepository::class)
 */
class RacialBonus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Race::class, inversedBy="racialBonus", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(Race $race): self
    {
        $this->race = $race;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' =>  $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription()
        ];
    }
}
