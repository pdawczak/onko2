<?php

namespace App\PacjentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacjentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imie')
            ->add('nazwisko')
            ->add('dataUrodzenia')
            ->add('plec')
            ->add('wzrost')
            ->add('waga')
            ->add('reka')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\PacjentBundle\Entity\Pacjent'
        ));
    }

    public function getName()
    {
        return 'app_pacjentbundle_pacjenttype';
    }
}
