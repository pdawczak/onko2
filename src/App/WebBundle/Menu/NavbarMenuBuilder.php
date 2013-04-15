<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 31.03.2013
 * Time: 19:46
 * To change this template use File | Settings | File Templates.
 */

namespace App\WebBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Mopa\Bundle\BootstrapBundle\Navbar\AbstractNavbarMenuBuilder;

class NavbarMenuBuilder extends AbstractNavbarMenuBuilder
{
    protected $securityContext;
    protected $isLoggedIn;

    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        parent::__construct($factory);

        $this->securityContext = $securityContext;
        $this->isLoggedIn = true; // $this->securityContext->isGranted('IS_AUTHENTICATED_FULLY');
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        return $menu;
    }

    public function createRightSideDropdownMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Pacjenci', array('route' => 'app_pacjent_index'));

        return $menu;
    }

//    public function createMainMenu(Request $request)
//    {
//        $menu = $this->factory->createItem('root');
//        $menu->setChildrenAttribute('class', 'nav');
//
//        $menu->addChild('Shipdev', array('route' => 'homepage', 'extras' => array('icon' => 'flag', 'icon_white' => true)));
//
//        $dropdown = $this->createDropdownMenuItem($menu, "Mehr", true, array('icon' => 'flag', 'inverted' => true));
//        $dropdown->addChild('Captain Ränge', array('route' => 'another'));
//        $dropdown->addChild('Schiffs-XP', array('route' => 'another'));
//
//        return $menu;
//    }
//
//    public function createRightSideDropdownMenu(Request $request)
//    {
//        $menu = $this->factory->createItem('root');
//        $menu->setChildrenAttribute('class', 'nav pull-right');
//
//        if ($this->isLoggedIn) {
//            $menu->addChild('Abmelden', array('route' => 'another'));
//        } else {
//            $menu->addChild('Anmelden', array('route' => 'another'));
//            $menu->addChild('Registrieren', array('route' => 'another'));
//        }
//
//        $this->addDivider($menu, true);
//        $menu->addChild('Impressum', array('route' => 'another'));
//
//        return $menu;
//    }
}
