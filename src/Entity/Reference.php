<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Reference
 * @package App/Entity
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceRepository")
 */
class Reference
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private ?int $id = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     * @Groups({"get"})
     */
    private ?string $title = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     * @Groups({"get"})
     */
    private ?string $company = null;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     * @Groups({"get"})
     */
    private ?string $description = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable")
     * @Assert\NotBlank(message="Ce champ ne peut être vide")
     * @Groups({"get"})
     */
    private ?DateTimeInterface $startedAt = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable", nullable=true)
     * @Groups({"get"})
     */
    private ?DateTimeInterface $endedAt = null;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Media", mappedBy="reference", cascade={"persist"}, orphanRemoval=true)
     * @Assert\Count(min=1, minMessage="Vous devez ajouter au moins 1 image")
     * @Groups({"get"})
     */
    private Collection $medias;

    /**
     * Reference Constructor.
     */
    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }



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
     * Get the value of title
     *
     * @return  string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param  string|null  $title
     *
     * @return  self
     */
    public function setTitle(?string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of company
     *
     * @return  string|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param  string|null  $company
     *
     * @return  self
     */
    public function setCompany(?string $company)
    {
        $this->company = $company;

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


    /**
     * Get the value of medias
     *
     * @return  Collection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * @param Media $media
     * @return void
     */
    public function addMedia(Media $media): void
    {
        if (!$this->medias->contains($media)) {
            $media->setReference($this);
            $this->medias->add($media);
        }
    }
    /**
     * @param Media $media
     * @return void
     */
    public function removeMedia(Media $media): void
    {
        if ($this->medias->contains($media)) {
            $media->setReference(null);
            $this->medias->removeElement($media);
        }
    }
}
