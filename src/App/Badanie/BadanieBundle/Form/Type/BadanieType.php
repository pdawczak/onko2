<?php

namespace App\Badanie\BadanieBundle\Form\Type;

use App\Badanie\PapierosyBundle\Entity\Papierosy;
use App\Badanie\PapierosyBundle\Form\Type\PapierosyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use App\Badanie\BadanieBundle\Entity\Badanie;

class BadanieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAttribute('error_type', 'block')
        ;

        $builder
            ->add('data', null, array(
                'label'     => 'Data badania',
                'widget'    => 'single_text',
                'attr'      => array(
                    'class' => 'input-medium',
                    'placeholder' => 'dd.mm.rrrr'
                ),
            ))
            ->add('wynikBadania', 'choice', array(
                'label'         => 'Wynik badania',
                'empty_value'   => '',
                'required'      => false,
                'choices'       => Badanie::$wyniki,
            ))
            ->add('papierosy', new PapierosyType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\BadanieBundle\Entity\Badanie',
            'validation_groups' => array('Default'),
        ));
    }

    public function getName()
    {
        return 'app_badanie_badaniebundle_badanietype';
    }
}
