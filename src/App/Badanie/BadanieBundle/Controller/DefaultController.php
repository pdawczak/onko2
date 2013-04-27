<?php

namespace App\Badanie\BadanieBundle\Controller;

use App\Badanie\BadanieBundle\Entity\Badanie;
use App\PacjentBundle\Entity\Pacjent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DefaultController extends Controller
{
    /**
     * @Route("/pacjent/{pacjentId}/badanie/dodaj", name="app_badanie_new")
     * @ParamConverter("pacjent", class="AppPacjentBundle:Pacjent", options={"id" = "pacjentId"})
     * @Method("GET")
     * @Template()
     */
    public function newAction(Pacjent $pacjent)
    {
        return array(
            'pacjent'   => $pacjent,
            'form'      => $this->get('app.form.factory')->getForm('AppBadanieBadanieBundle:Badanie')->createView(),
        );
    }

    /**
     * @Route("/pacjent/{pacjentId}/badanie/dodaj", name="app_badanie_create")
     * @ParamConverter("pacjent", class="AppPacjentBundle:Pacjent", options={"id" = "pacjentId"})
     * @Method("POST")
     * @Template("AppBadanieBadanieBundle:Default:new.html.twig")
     */
    public function createAction(Pacjent $pacjent)
    {
        /** @var \Symfony\Component\Form\Form $form */
        $form = $this->get('app.form.factory')->getForm('AppBadanieBadanieBundle:Badanie');

        if ($this->get('app.form.persist')->process($form)) {
            $this->get('session')->setFlash('success', 'Dane zpisane poprawnie.');
            return $this->redirect($this->generateUrl('app_pacjent_show', array('pacjentId' => $pacjent->getId())));
        }

        return array(
            'pacjent'   => $pacjent,
            'form'      => $form->createView(),
        );
    }

    /**
     * @Route("/pacjent/{pacjentId}/badanie/{badanieId}/wynik/ustaw", name="app_badanie_set_wynik")
     * @ParamConverter("pacjent", class="AppPacjentBundle:Pacjent", options={"id" = "pacjentId"})
     * @ParamConverter("badanie", class="AppBadanieBadanieBundle:Badanie", options={"id" = "badanieId"})
     * @Method("GET")
     * @Template()
     */
    public function setWynikAction(Pacjent $pacjent, Badanie $badanie)
    {
        return array(
            'pacjent'   => $pacjent,
            'badanie'   => $badanie,
            'form'      => $this
                ->get('app.form.factory')
                ->getFormFactory('AppBadanieBadanieBundle:Badanie')
                ->getBadanieWynikForm()
                ->createView()
            ,
        );
    }



    /**
     * @Route("/pacjent/{pacjentId}/badanie/{badanieId}/wynik/ustaw", name="app_badanie_update_wynik")
     * @ParamConverter("pacjent", class="AppPacjentBundle:Pacjent", options={"id" = "pacjentId"})
     * @ParamConverter("badanie", class="AppBadanieBadanieBundle:Badanie", options={"id" = "badanieId"})
     * @Method("PUT")
     * @Template("AppBadanieBadanieBundle:Default:setWynik.html.twig")
     */
    public function updateWynikAction(Pacjent $pacjent, Badanie $badanie)
    {
        $form = $this
            ->get('app.form.factory')
            ->getFormFactory('AppBadanieBadanieBundle:Badanie')
            ->getBadanieWynikForm()
        ;

        if ($this->get('app.form.persist')->process($form)) {
            $this->get('session')->setFlash('success', 'Dane zpisane poprawnie.');
            return $this->redirect($this->generateUrl('app_pacjent_show', array('pacjentId' => $pacjent->getId())));
        }

        return array(
            'pacjent'   => $pacjent,
            'badanie'   => $badanie,
            'form'      => $form->createView(),
        );
    }
}
