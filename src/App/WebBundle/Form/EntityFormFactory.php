<?php

namespace App\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactory;
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
    public function __construct(FormFactory $factory, Request $request)
    {
        $this->factory = $factory;
        $this->request = $request;
    }

    /**
     * @param AbstractType $type
     * @param mixed $data
     * @param array $options
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    protected function createForm(AbstractType $type, $data = null, array $options = array())
    {
        return $this->factory->create($type, $data, $options);
    }

    /**
     * @param mixed $data
     * @param array $options
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    abstract public function getForm($data = null, array $options = array());
}
