<?php

namespace App\PacjentBundle\Controller;

use App\PacjentBundle\Entity\Pacjent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
     * @Template
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
     * @Template
     */
    public function newAction()
    {
        return array(
            'form'  => $this->get('app.form.factory')->getForm('AppPacjentBundle:Pacjent')->createView(),
        );
    }

    /**
     * @Route("/dodaj", name="app_pacjent_create")
     * @Method("POST")
     * @Template("AppPacjentBundle:Default:new.html.twig")
     */
    public function createAction()
    {
        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->get('app.form.factory')->getForm('AppPacjentBundle:Pacjent');

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

    /**
     * @Route("/{pacjentId}", name="app_pacjent_show", requirements={"pacjentId" = "\d+"})
     * @Method("GET")
     * @Template
     * @ParamConverter("pacjent", class="AppPacjentBundle:Pacjent", options={"id" = "pacjentId"})
     */
    public function showAction(Pacjent $pacjent)
    {
    }
}
