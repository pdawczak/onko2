<?php

namespace App\Badanie\UzywkiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Route("/hello/{name}")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}