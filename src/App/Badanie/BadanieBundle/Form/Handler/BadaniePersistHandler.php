<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 02.05.2013
 * Time: 09:44
 * To change this template use File | Settings | File Templates.
 */

namespace App\Badanie\BadanieBundle\Form\Handler;

use App\WebBundle\Form\Handler\FormPersistHandler;

use App\Badanie\PapierosyBundle\Model\Papierosy as Model;

class BadaniePersistHandler extends FormPersistHandler
{
    protected function preOnSuccess()
    {
        $badanie = $this->form->getData();

        // In case Model class in Papieros -> get Entity
        if ($badanie->getPapierosy() instanceof Model) {
            $papierosy = $badanie->getPapierosy()->getEntity();
            $badanie->setPapierosy($papierosy);
        }

        return $badanie;
    }
}
