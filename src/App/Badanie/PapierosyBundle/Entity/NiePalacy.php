<?php

namespace App\Badanie\PapierosyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NiePalacy
 *
 * @ORM\Table(name="papierosy_niepalacy")
 * @ORM\Entity
 */
class NiePalacy extends Papierosy
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
}
