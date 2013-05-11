<?php

namespace App\Badanie\UzywkiBundle\Entity\Alkohol;

use App\Badanie\BadanieBundle\Entity\Badanie;
use Doctrine\ORM\Mapping as ORM;

/**
 * Alkohol
 *
 * @ORM\Table(name="alkohol")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"niepijacy" = "Niepijacy", "pijacy" = "Pijacy"})
 * @ORM\Entity
 */
abstract class Alkohol
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
     * @var \App\Badanie\BadanieBundle\Entity\Badanie
     *
     * @ORM\OneToOne(targetEntity="App\Badanie\BadanieBundle\Entity\Badanie", inversedBy="alkohol")
     */
    private $badanie;

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    abstract public function getType();

    /**
     * @return string
     */
    abstract public function getTemplate();

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
     * Set badanie
     *
     * @param \App\Badanie\BadanieBundle\Entity\Badanie $badanie
     * @return Alkohol
     */
    public function setBadanie(Badanie $badanie = null)
    {
        $this->badanie = $badanie;
    
        return $this;
    }

    /**
     * Get badanie
     *
     * @return \App\Badanie\BadanieBundle\Entity\Badanie 
     */
    public function getBadanie()
    {
        return $this->badanie;
    }
}
