<?php

namespace App\Badanie\UzywkiBundle\Form\Type\Alkohol;

use App\Badanie\UzywkiBundle\Model\Alkohol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlkoholType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\UzywkiBundle\Entity\Alkohol\Alkohol'
        ));
    }

    public function getName()
    {
        return 'app_badanie_uzywkibundle_alkohol_alkoholtype';
    }
}
