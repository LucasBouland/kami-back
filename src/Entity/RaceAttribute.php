<?php

namespace App\Entity;

use App\Repository\RaceAttributeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceAttributeRepository::class)
 */
class RaceAttribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="raceAttribute")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $strength;

    /**
     * @ORM\Column(type="integer")
     */
    private $agility;

    /**
     * @ORM\Column(type="integer")
     */
    private $intellect;

    /**
     * @ORM\Column(type="integer")
     */
    private $will;

    /**
     * @ORM\Column(type="integer")
     */
    private $luck;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
    
    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getAgility(): ?int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): self
    {
        $this->agility = $agility;

        return $this;
    }

    public function getIntellect(): ?int
    {
        return $this->intellect;
    }

    public function setIntellect(int $intellect): self
    {
        $this->intellect = $intellect;

        return $this;
    }

    public function getWill(): ?int
    {
        return $this->will;
    }

    public function setWill(int $will): self
    {
        $this->will = $will;

        return $this;
    }

    public function getLuck(): ?int
    {
        return $this->luck;
    }

    public function setLuck(int $luck): self
    {
        $this->luck = $luck;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'strength' => $this->getStrength(),
            'agility' => $this->getAgility(),
            'intellect' => $this->getIntellect(),
            'will' => $this->getWill(),
            'luck' => $this->getLuck()
        ];
    }
}
