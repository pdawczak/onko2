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
            ->setAttribute('error_type', 'block')
        ;

        $builder
            ->add('imie'        , null, array(
                'label'     => 'Imię',
            ))
            ->add('nazwisko'    , null, array(
            ))
            ->add('dataUrodzenia', 'text', array(
                'label'     => 'Data urodzenia',
                'attr'      => array(
                    'class' => 'input-small datepicker',
                    'placeholder' => 'dd.mm.rrrr'
                ),
            ))
            ->add('plec'    , 'choice', array(
                'label'         => 'Płeć',
                'expanded'      => true,
                'widget_type'   => 'inline',
                'choices'       => array(
                    'm' => 'Mężczyzna',
                    'k' => 'Kobieta'
                )
            ))
            ->add('wzrost'  , null, array(
                'widget_suffix' => 'cm',
                'attr'      => array(
                    'class' => 'input-mini',
                )
            ))
            ->add('wagaKg'  , null, array(
                'label'     => 'Waga',
                'widget_suffix' => 'kg',
                'attr'      => array(
                    'class' => 'input-mini',
                )
            ))
            ->add('reka'    , 'choice', array(
                'expanded'      => true,
                'widget_type'   => 'inline',
                'label_render'  => false,
                'choices'       => array(
                    'l' => 'Leworęczny',
                    'p' => 'Praworęczny'
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\PacjentBundle\Entity\Pacjent',
            'error_type' => 'block',
        ));
    }

    public function getName()
    {
        return 'app_pacjentbundle_pacjenttype';
    }
}
