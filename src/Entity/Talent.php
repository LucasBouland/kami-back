<?php

namespace App\Entity;

use App\Repository\TalentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TalentRepository::class)
 */
class Talent
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
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $timing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reach;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $target;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cost;

    /**
     * @ORM\Column(type="text")
     */
    private $effect;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTiming(): ?string
    {
        return $this->timing;
    }

    public function setTiming(string $timing): self
    {
        $this->timing = $timing;

        return $this;
    }

    public function getReach(): ?string
    {
        return $this->reach;
    }

    public function setReach(string $reach): self
    {
        $this->reach = $reach;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'timing' => $this->getTiming(),
            'reach' => $this->getReach(),
            'target' => $this->getTarget(),
            'cost' => $this->getCost(),
            'effect' => $this->getEffect(),
            'reference' => $this->getReference()
        ];
    }
}
