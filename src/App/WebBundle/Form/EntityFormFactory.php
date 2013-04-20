<?php

namespace App\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactory as SymfonyFactory;
use Symfony\Component\HttpFoundation\Request;

abstract class EntityFormFactory
{
    /**
     * @var \Symfony\Component\Form\FormFactory
     */
    protected $factory;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @param \Symfony\Component\Form\FormFactory $factory
     * @param Request $request
     */
    public function __construct(SymfonyFactory $factory, Request $request)
    {
        $this->factory = $factory;
        $this->request = $request;
    }

    /**
     * @param AbstractType $type
     * @param null $data
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    protected function createForm(AbstractType $type, $data = null)
    {
        return $this->factory->create($type, $data);
    }

    /**
     * @param mixed $data
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    abstract public function getForm($data = null);
}
