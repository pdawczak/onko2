<?php

namespace App\Badanie\UzywkiBundle\Form\Type\Alkohol;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PijacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iloscJednostekNaTydzien', null, array(
                'label'     => 'Il. jedn. na tydzień'
            ))
            ->add('przedBadaniem', null, array(
                'label'     => 'Przed badaniem?',
                'required'  => false,
            ))
            ->add('iloscJednostekPrzedBadaniem', null, array(
                'label'     => 'Il. jedn. przed badaniem'
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
            'data_class' => 'App\Badanie\UzywkiBundle\Entity\Alkohol\Pijacy'
        ));
    }

    public function getName()
    {
        return 'app_badanie_uzywkibundle_alkohol_pijacytype';
    }
}
