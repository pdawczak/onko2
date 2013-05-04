<?php

namespace App\Badanie\PapierosyBundle\Form\Type;

use App\Badanie\PapierosyBundle\Entity\Papierosy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PapierosyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('kind', 'choice', array(
                'expanded'      => true,
                'widget_type'   => 'inline',
                'label'         => false,
                'choices'       => Papierosy::$kinds,
            ))
            ->add('niepalacy', new NiepalacyType())
            ->add('aktywniePalacy', new AktywniePalacyType())
            ->add('bierniePalacy', new BierniePalacyType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\PapierosyBundle\Model\Papierosy'
        ));
    }

    public function getName()
    {
        return 'app_badanie_papierosybundle_niepalacytype';
    }
}
