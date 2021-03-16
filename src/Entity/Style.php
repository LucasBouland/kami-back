<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StyleRepository::class)
 */
class Style
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
     * @ORM\Column(type="string", length=255)
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $accuracy;

    /**
     * @ORM\Column(type="integer")
     */
    private $evasion;

    /**
     * @ORM\Column(type="integer")
     */
    private $conjure;

    /**
     * @ORM\Column(type="integer")
     */
    private $resist;

    /**
     * @ORM\Column(type="integer")
     */
    private $insight;

    /**
     * @ORM\Column(type="integer")
     */
    private $physicalDamage;

    /**
     * @ORM\Column(type="integer")
     */
    private $magicalDamage;

    /**
     * @ORM\Column(type="integer")
     */
    private $initiative;

    /**
     * @ORM\Column(type="integer")
     */
    private $healthPoint;

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

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

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

    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): self
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getEvasion(): ?int
    {
        return $this->evasion;
    }

    public function setEvasion(int $evasion): self
    {
        $this->evasion = $evasion;

        return $this;
    }

    public function getConjure(): ?int
    {
        return $this->conjure;
    }

    public function setConjure(int $conjure): self
    {
        $this->conjure = $conjure;

        return $this;
    }

    public function getResist(): ?int
    {
        return $this->resist;
    }

    public function setResist(int $resist): self
    {
        $this->resist = $resist;

        return $this;
    }

    public function getInsight(): ?int
    {
        return $this->insight;
    }

    public function setInsight(int $insight): self
    {
        $this->insight = $insight;

        return $this;
    }

    public function getPhysicalDamage(): ?int
    {
        return $this->physicalDamage;
    }

    public function setPhysicalDamage(int $physicalDamage): self
    {
        $this->physicalDamage = $physicalDamage;

        return $this;
    }

    public function getMagicalDamage(): ?int
    {
        return $this->magicalDamage;
    }

    public function setMagicalDamage(int $magicalDamage): self
    {
        $this->magicalDamage = $magicalDamage;

        return $this;
    }

    public function getInitiative(): ?int
    {
        return $this->initiative;
    }

    public function setInitiative(int $initiative): self
    {
        $this->initiative = $initiative;

        return $this;
    }

    public function getHealthPoint(): ?int
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(int $healthPoint): self
    {
        $this->healthPoint = $healthPoint;

        return $this;
    }
}
