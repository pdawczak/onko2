<?php

namespace App\PacjentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use App\PacjentBundle\Form\Type\PacjentType;

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

    /**
     * @Route("/dodaj", name="app_pacjent_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return array(
            'form'  => $this->createForm(new PacjentType())->createView(),
        );
    }

    /**
     * @Route("/dodaj", name="app_pacjent_create")
     * @Method("POST")
     * @Template("AppPacjentBundle:Default:new.html.twig")
     */
    public function createAction()
    {
        $form = $this->createForm(new PacjentType());

        $form->bind($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($form->getData());
            $em->flush();

            $this->get('session')->setFlash('success', 'Dane zpisane poprawnie.');
            return $this->redirect($this->generateUrl('app_pacjent_index'));
        }

        return array(
            'form'  => $form->createView(),
        );
    }
}
