<?php

namespace App\PacjentBundle\Form;

use App\PacjentBundle\Entity\Pacjent;
use App\PacjentBundle\Form\Type\PacjentType;
use Symfony\Component\HttpFoundation\Request;

use App\WebBundle\Service\EntityFormFactory;

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
