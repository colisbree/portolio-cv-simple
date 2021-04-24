<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Skill
 * //@Package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
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
     * @var int|null
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     * @Assert\Range(
     *      min=1,
     *      max=10,
     *      minMessage="Doit être supérieur ou = 1",
     *      maxMessage="Doit être inférieur ou = 10"
     * )
     */
    private ?int $level = null;

    

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
     * Get the value of level
     *
     * @return  int|null
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @param  int|null  $level
     *
     * @return  self
     */
    public function setLevel(?int $level)
    {
        $this->level = $level;

        return $this;
    }
}

