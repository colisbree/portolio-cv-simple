<?php
namespace App\Form;

use App\Entity\Skill;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SkillType
 * @package App\Form
 */
class SkillType extends AbstractType
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
         ->add("name", TextType::class, [
             "label" => "Nom de la compétence : ",
             "attr" => [
                 "placeholder" => "Entrez le nom de la compétence..."
             ]
         ])
         ->add("level", RangeType::class, [
            "label" => "Votre niveau : ",
            "attr" => [
                "min" => 1,
                "max" => 10
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
        $resolver->setDefault("data_class", Skill::class);
    }
}
