<?php

namespace App\Badanie\PapierosyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AktywniePalacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iloscSztukDziennie', null, array(
                'label'     => 'Ilość sztuk dziennie',
            ))
            ->add('okresPalenia', null, array(
                'label'     => 'Okre palenia',
            ))
            ->add('ostatniPapieros', null, array(
                'label'     => 'Ostatni papieros',
            ))
            ->add('dataZaprzestania', null, array(
                'label'     => 'Data zaprzestania',
                'widget'    => 'single_text',
                'attr'      => array(
                    'class' => 'input-medium',
                    'placeholder' => 'dd.mm.rrrr'
                ),
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\PapierosyBundle\Entity\AktywniePalacy'
        ));
    }

    public function getName()
    {
        return 'app_badanie_papierosybundle_aktywniepalacytype';
    }
}
