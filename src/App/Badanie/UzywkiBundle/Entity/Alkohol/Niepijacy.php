<?php

namespace App\Badanie\UzywkiBundle\Entity\Alkohol;

use App\Badanie\UzywkiBundle\Form\Type\Alkohol\NiepijacyType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Niepijacy
 *
 * @ORM\Table(name="alkohol_niepijacy")
 * @ORM\Entity
 */
class Niepijacy extends Alkohol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    public function getType()
    {
        return new NiepijacyType();
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'AppBadanieUzywkiBundle:Default:partials/_niepijacy.html.twig';
    }
}
