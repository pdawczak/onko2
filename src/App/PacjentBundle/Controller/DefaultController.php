<?php

namespace App\PacjentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 * @package App\PacjentBundle\Controller
 *
 * @Route("/pacjent")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="app_pacjent_index")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'pacjenci'  => $this->get('app_pacjent.repository')->findAll(),
        );
    }
}
