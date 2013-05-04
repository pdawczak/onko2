<?php

namespace App\Badanie\UzywkiBundle\Entity\Alkohol;

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
        // TODO: Implement getType() method.
    }
}