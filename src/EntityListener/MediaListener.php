<?php
namespace App\EntityListener;

use App\Entity\Media;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class MediaListener
 * @package App\EntityListener
 */
Class MediaListener
{
    /**
     * @var string
     */
    private string $uploadDir;

    /**
     * @var string
     */
    private string $uploadAbsoluteDir;
    
    /**
     * MediaListener construtor
     *
     * @param string $uploadDir
     * @param string $uploadAbsoluteDir
     */
    public function __construct(string $uploadDir, string $uploadAbsoluteDir)
    {
        $this->uploadDir = $uploadDir;
        $this->uploadAbsoluteDir = $uploadAbsoluteDir;
    }


    /**
     * @param Media $media
     * @return void
     */
    public function prePersist(Media $media): void
    {
        $this->upload($media);
    }

    /**
     * @param Media $media
     * @return void
     */
    public function preUpdate(Media $media): void
    {
        $this->upload($media);
    }

    /**
     * @param Media $media
     * @return void
     */
    private function upload(Media $media): void
    {
        if ($media->getFile() instanceOf UploadedFile){
            $filename = sprintf("%s.%s", Uuid::v4(), $media->getFile()->getClientOriginalExtension());
            $media->getFile()->move($this->uploadAbsoluteDir, $filename);
            $media->setPath(sprintf("%s/%s", $this->uploadDir, $filename));
        }
    }
}
