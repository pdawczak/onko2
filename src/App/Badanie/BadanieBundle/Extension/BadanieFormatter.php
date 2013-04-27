<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 17.04.2013
 * Time: 19:44
 * To change this template use File | Settings | File Templates.
 */

namespace App\Badanie\BadanieBundle\Extension;

use Symfony\Bundle\FrameworkBundle\Routing\Router;

use App\Badanie\BadanieBundle\Entity\Badanie;

class BadanieFormatter extends \Twig_Extension
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'wynik_badania' => new \Twig_Filter_Method($this, 'renderWynikBadania', array('is_safe' => array('html'))),
        );
    }

    /**
     * @param \App\Badanie\BadanieBundle\Entity\Badanie $badanie
     * @throws \Exception
     * @return string
     */
    public function renderWynikBadania(Badanie $badanie)
    {
        if ($wynik = $badanie->getWynikBadania()) {
            return Badanie::$wyniki[$wynik];
        }

        $url = $this->router->generate('app_badanie_set_wynik', array(
            'badanieId' => $badanie->getId(),
            'pacjentId' => $badanie->getPacjent()->getId(),
        ));

        return sprintf('<a href="%s">%s</a>', $url, 'Ustaw');
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'badanie_formatter';
    }
}
