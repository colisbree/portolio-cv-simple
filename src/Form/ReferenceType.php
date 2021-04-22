<?php
namespace App\Form;

use App\Form\MediaType;
use App\Entity\Reference;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * Class ReferenceType
 * @package App\Form
 */
class ReferenceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add("title", TextType::class, [
                "label" => "Intitulé de votre poste",
                "attr" => [
                    "placeholder" => "Entrez le nom de votre poste"
                ]
            ])
            -> add("company", TextType::class, [
                "label" => "Nom de l'entreprise",
                "attr" => [
                    "placeholder" => "Entrez le nom de l'entreprise"
                ]
            ])
            -> add("description", TextareaType::class, [
                "label" => "Description du poste",
                "attr" => [
                    "placeholder" => "Entrez la description du poste"
                ]
            ])
            ->add("startedAt", DateType::class, [
                "label" => "Début",
                "input" => "datetime_immutable",
                "widget" => "single_text"
            ])
            ->add("endedAt", DateType::class, [
                "label" => "Fin",
                "input" => "datetime_immutable",
                "widget" => "single_text",
                "required" => "false"
            ])
            ->add("medias", CollectionType::class, [
                "entry_type" => MediaType::class,
                "entry_options" => [
                    "label" => false,
                ],
                "allow_add" => true,
                "allow_delete" => true,
                "by_reference" => false
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
        $resolver->setDefault("data_class", Reference::class);
    }
}
