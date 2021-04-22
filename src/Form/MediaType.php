<?php
namespace App\Form;

use App\Entity\Media;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;


/**
 * Class MediaType
 * @package App\Form
 */
class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("file",FileType::class, [
                "label" => "Image :",
                //"mapped" => false,
                "required" => false,
                "constraints" => [
                    new Image()
                ]
            ])
            
        ;

    }
    
    /**
     * @param OptionsResolver $resolver
     * @return void
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", Media::class);
    }
}
