<?php

namespace App\Badanie\BadanieBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use App\Badanie\BadanieBundle\Entity\Badanie;

class BadanieWynikType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wynikBadania', 'choice', array(
                'label'         => 'Wynik badania',
                'empty_value'   => '',
                'required'      => false,
                'choices'       => Badanie::$wyniki,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\BadanieBundle\Entity\Badanie'
        ));
    }

    public function getName()
    {
        return 'app_badanie_badaniebundle_badanietype';
    }
}
