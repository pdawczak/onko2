<?php

namespace App\Badanie\PapierosyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Badanie\BadanieBundle\Entity\Badanie;

/**
 * Papierosy
 *
 * @ORM\Table(name="papierosy")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"niepalacay" = "NiePalacy", "aktywnie_palacy" = "AktywniePalacy", "biernie_palacy" = "BierniePalacy"})
 * @ORM\Entity
 */

class Papierosy
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
     * @ORM\OneToOne(targetEntity="App\Badanie\BadanieBundle\Entity\Badanie", inversedBy="papierosy")
     */
    protected $badanie;

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
     * @return Papierosy
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
