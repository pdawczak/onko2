<?php

namespace App\PacjentBundle\Form;

use Symfony\Component\HttpFoundation\Request;

use App\PacjentBundle\Form\Type\PacjentType;
use App\WebBundle\Form\EntityFormFactory;

class PacjentFormFactory extends EntityFormFactory
{
    /**
     * @param null $data
     * @param array $options
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    public function getForm($data = null, array $options = array())
    {
        if (! $data) {
            if ($pacjent = $this->request->attributes->get('pacjent')) {
                $data = $pacjent;
            }
        }

        return $this->createForm(new PacjentType(), $data, $options);
    }
}
