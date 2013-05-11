<?php

namespace App\Badanie\UzywkiBundle\Form\Type\Alkohol;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NiepijacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('badanie')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\UzywkiBundle\Entity\Alkohol\Niepijacy'
        ));
    }

    public function getName()
    {
        return 'app_badanie_uzywkibundle_alkohol_niepijacytype';
    }
}
