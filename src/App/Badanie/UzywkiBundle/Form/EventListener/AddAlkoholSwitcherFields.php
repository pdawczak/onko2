<?php

namespace App\Badanie\UzywkiBundle\Form\EventListener;

use App\Badanie\UzywkiBundle\Form\Type\Alkohol\AlkoholType;
use App\Badanie\UzywkiBundle\Form\Type\Alkohol\NiepijacyType;
use App\Badanie\UzywkiBundle\Form\Type\Alkohol\PijacyType;
use App\Badanie\UzywkiBundle\Model\Alkohol;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddAlkoholSwitcherFields implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $factory;

    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_BIND        => 'addFields',
            FormEvents::PRE_SET_DATA    => 'addFields',
        );
    }

    public function addFields(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $form
            ->add(
                $this->factory->createNamed('kind', 'choice', null, array(
                        'choices'       => Alkohol::$kinds,
                        'widget_type'   => 'inline',
                        'expanded'      => true,
                        'label'         => false,
                    )
                )
            )
            ->add(
                $this->factory->createNamed('niepijacy', new NiepijacyType())
            )
            ->add(
                $this->factory->createNamed('pijacy', new PijacyType())
            )
        ;
    }
}
