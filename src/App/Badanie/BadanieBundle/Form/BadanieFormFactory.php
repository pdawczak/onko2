<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 25.04.2013
 * Time: 21:04
 * To change this template use File | Settings | File Templates.
 */

namespace App\Badanie\BadanieBundle\Form;

use App\WebBundle\Form\EntityFormFactory;

use App\Badanie\BadanieBundle\Entity\Badanie;
use App\Badanie\BadanieBundle\Form\Type\BadanieType;

class BadanieFormFactory extends EntityFormFactory
{
    /**
     * @param mixed $data
     * @param array $options
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    public function getForm($data = null, array $options = array())
    {
        if (! $data) {
            if ($badanie = $this->request->attributes->get('badanie')) {
                $data = $badanie;
            }
            else {
                $data = new Badanie();
                $data->setPacjent($this->request->attributes->get('pacjent'));
            }
        }

        return $this->createForm(new BadanieType(), $data, $options);
    }
}
