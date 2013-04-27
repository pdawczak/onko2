<?php

namespace App\Badanie\PapierosyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BierniePalacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('miejsceNarazenia')
            ->add('czasEkspozycji')
            ->add('ostatnioNarazony')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\PapierosyBundle\Entity\BierniePalacy'
        ));
    }

    public function getName()
    {
        return 'app_badanie_papierosybundle_bierniepalacytype';
    }
}
