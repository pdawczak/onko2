<?php

namespace App\Badanie\BadanieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\PacjentBundle\Entity\Pacjent;

/**
 * Badanie
 *
 * @ORM\Table(name="badania")
 * @ORM\Entity(repositoryClass="App\Badanie\BadanieBundle\Repository\BadanieRepository")
 */
class Badanie
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
     * @var \App\PacjentBundle\Entity\Pacjent
     *
     * @ORM\ManyToOne(targetEntity="App\PacjentBundle\Entity\Pacjent", inversedBy="badania")
     */
    private $pacjent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $data;

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
     * Set data
     *
     * @param \DateTime $data
     * @return Badanie
     */
    public function setData($data)
    {
        $this->data = $data;
    
        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set pacjent
     *
     * @param \App\PacjentBundle\Entity\Pacjent $pacjent
     * @return Badanie
     */
    public function setPacjent(Pacjent $pacjent = null)
    {
        $this->pacjent = $pacjent;
    
        return $this;
    }

    /**
     * Get pacjent
     *
     * @return \App\PacjentBundle\Entity\Pacjent 
     */
    public function getPacjent()
    {
        return $this->pacjent;
    }
}
