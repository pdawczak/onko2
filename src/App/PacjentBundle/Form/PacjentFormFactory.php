<?php

namespace App\PacjentBundle\Form;

use Symfony\Component\HttpFoundation\Request;

use App\PacjentBundle\Form\Type\PacjentType;
use App\WebBundle\Form\EntityFormFactory;

class PacjentFormFactory extends EntityFormFactory
{
    /**
     * @param mixed $data
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    public function getForm($data = null)
    {
        return $this->createForm(new PacjentType(), $data);
    }
}
