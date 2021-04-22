<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Media
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @ORM\EntityListeners({"App\EntityListener\MediaListener"})
 */
Class Media
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
     */
    private ?string $path = null;

    /**
     * @var string|null
     * @Assert\Image
     * @ORM\Column
     */
    private ?UploadedFile $file = null;

    
    /**
     * @var Reference|null
     * @ORM\ManyToOne(targetEntity="Reference", inversedBy="medias")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private ?Reference $reference;

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
     * Get the value of path
     *
     * @return  string|null
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @param  string|null  $path
     *
     * @return  self
     */
    public function setPath(?string $path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of reference
     *
     * @return  Reference|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @param  Reference|null  $reference
     *
     * @return  self
     */
    public function setReference(?Reference $reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of file
     *
     * @return  UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @param  UploadedFile|null  $file
     *
     * @return  self
     */
    public function setFile(?UploadedFile $file) 
    {
        $this->file = $file;

        return $this;
    }
}