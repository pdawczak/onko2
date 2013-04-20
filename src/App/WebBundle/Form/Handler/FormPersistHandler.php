<?php

namespace App\WebBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class SimpleFormPersistHandler
{
    /**
     * @var \Symfony\Component\Form\Form
     */
    protected $form;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @param Request $request
     * @param EntityManager $em
     */
    public function __construct(Request $request, EntityManager $em)
    {
        $this->request  = $request;
        $this->em       = $em;
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     * @return bool
     */
    public function process(Form $form)
    {
        $this->form = $form;

        if(in_array($this->request->getMethod(), array('POST', 'PUT')))
        {
            $this->form->bind($this->request);

            if ($this->form->isValid())
            {
                $data = $this->preOnSuccess();
                $this->onSuccess($data);
                return true;
            }
        }
        return false;
    }

    /**
     * @return mixed
     */
    protected function preOnSuccess()
    {
        return $this->form->getData();
    }

    /**
     * @param $data
     */
    protected function onSuccess($data)
    {
        $this->em->persist($data);
        $this->em->flush();
    }
}
