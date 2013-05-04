<?php

namespace App\Badanie\PapierosyBundle\Entity;

use App\Badanie\PapierosyBundle\Form\Type\NiePalacyType;
use Doctrine\ORM\Mapping as ORM;

/**
 * NiePalacy
 *
 * @ORM\Table(name="papierosy_niepalacy")
 * @ORM\Entity
 */
class Niepalacy extends Papierosy
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
    function getType()
    {
        return new NiepalacyType();
    }
}
