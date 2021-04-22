<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormationRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Formation
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 * //@Package App\Entity
 */
class Formation
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     */
    private ?string $name = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     */
    private ?string $school = null;

    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     */
    private ?int $gradeLevel = null;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     */
    private ?string $description = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable")
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     */
    private ?DateTimeInterface $startedAt = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private ?DateTimeInterface $endedAt = null;

    /**
     * Get the value of id
     *
     * @return  int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int|null  $id
     *
     * @return  self
     */
    public function setId(?int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string|null  $name
     *
     * @return  self
     */
    public function setName(?string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of school
     *
     * @return  string|null
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set the value of school
     *
     * @param  string|null  $school
     *
     * @return  self
     */
    public function setSchool(?string $school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get the value of gradeLevel
     *
     * @return  int|null
     */
    public function getGradeLevel()
    {
        return $this->gradeLevel;
    }

    /**
     * Set the value of gradeLevel
     *
     * @param  int|null  $gradeLevel
     *
     * @return  self
     */
    public function setGradeLevel(?int $gradeLevel)
    {
        $this->gradeLevel = $gradeLevel;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string|null  $description
     *
     * @return  self
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of startedAt
     *
     * @return  DateTimeInterface|null
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * Set the value of startedAt
     *
     * @param  DateTimeInterface|null  $startedAt
     *
     * @return  self
     */
    public function setStartedAt(?DateTimeInterface $startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Get the value of endedAt
     *
     * @return  DateTimeInterface|null
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * Set the value of endedAt
     *
     * @param  DateTimeInterface|null  $endedAt
     *
     * @return  self
     */
    public function setEndedAt(?DateTimeInterface $endedAt)
    {
        $this->endedAt = $endedAt;

        return $this;
    }
}
