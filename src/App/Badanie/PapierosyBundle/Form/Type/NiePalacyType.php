<?php

namespace App\Badanie\PapierosyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NiepalacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\PapierosyBundle\Entity\NiePalacy'
        ));
    }

    public function getName()
    {
        return 'app_badanie_papierosybundle_niepalacytype';
    }
}
