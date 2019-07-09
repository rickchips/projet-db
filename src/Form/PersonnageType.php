<?php

namespace App\Form;

use App\Entity\Personnage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomPerso')
            ->add('aptLeaderPerso')
            ->add('aptPassPerso')
            ->add('imagePerso')
            ->add('dateCreationPerso')
            ->add('dateModifPerso')
            ->add('pseudoUser')
            ->add('nomLiens')
            ->add('nomCategorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
