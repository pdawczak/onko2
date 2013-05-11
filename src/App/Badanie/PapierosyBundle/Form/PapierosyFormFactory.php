<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 27.04.2013
 * Time: 13:38
 * To change this template use File | Settings | File Templates.
 */

namespace App\Badanie\PapierosyBundle\Form;


use App\WebBundle\Form\EntityFormFactory;

class PapierosyFormFactory extends EntityFormFactory
{
    /**
     * @param mixed $data
     * @param array $options
     * @throws \Exception
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    public function getForm($data = null, array $options = array())
    {
        if (! $data) {
            throw new \Exception('Data parameter is required');
        }

        return $this->createForm($data->getFormType(), $data, $options);
    }
}
