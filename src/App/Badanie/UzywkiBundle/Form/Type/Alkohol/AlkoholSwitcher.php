<?php

namespace App\Badanie\UzywkiBundle\Form\Type\Alkohol;


use App\Badanie\UzywkiBundle\Form\DataTransformer\AlkoholTransformer;
use App\Badanie\UzywkiBundle\Model\Alkohol;
use App\Badanie\UzywkiBundle\Form\EventListener\AddAlkoholSwitcherFields;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlkoholSwitcher extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new AlkoholTransformer();
        $builder->addModelTransformer($transformer);

        $subscriber = new AddAlkoholSwitcherFields($builder->getFormFactory());
        $builder->addEventSubscriber($subscriber);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Badanie\UzywkiBundle\Entity\Alkohol\Alkohol',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'alkohol_switcher';
    }
}
