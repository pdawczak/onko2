<?php

namespace App\Badanie\BadanieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use App\PacjentBundle\Entity\Pacjent;
use App\Badanie\PapierosyBundle\Entity\Papierosy;

/**
 * Badanie
 *
 * @ORM\Table(name="badania")
 * @ORM\Entity(repositoryClass="App\Badanie\BadanieBundle\Repository\BadanieRepository")
 */
class Badanie
{
    public static $wyniki = array(
        'wz'    => 'WZ - wznowa',
        'pr'    => 'PR - progresja',
        'stg'   => 'STG - stagnacja (guz stabilny)',
        'bcg'   => 'BCG - brak cech guza'
    );

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
     * @Assert\NotBlank(groups={"Default"})
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="wynik_badania", type="string", length=5, nullable=true)
     * @Assert\NotBlank(groups={"setWynik"})
     */
    private $wynikBadania;

    /**
     * @var \App\Badanie\PapierosyBundle\Entity\Papierosy
     *
     * @ORM\OneToOne(targetEntity="App\Badanie\PapierosyBundle\Entity\Papierosy", mappedBy="badanie", cascade={"persist"})
     */
    private $papierosy;

    /**
     * @var \App\Badanie\UzywkiBundle\Entity\Alkohol\Alkohol
     *
     * @ORM\OneToOne(targetEntity="App\Badanie\UzywkiBundle\Entity\Alkohol\Alkohol", mappedBy="badanie", cascade={"persist"})
     */
    private $alkohol;

    /**
     * @param \DateTime $dataBadania
     */
    public function __construct(\DateTime $dataBadania = null)
    {
        $this->setData($dataBadania);
    }

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

    /**
     * Set wynikBadania
     *
     * @param string $wynikBadania
     * @return Badanie
     */
    public function setWynikBadania($wynikBadania)
    {
        $this->wynikBadania = $wynikBadania;
    
        return $this;
    }

    /**
     * Get wynikBadania
     *
     * @return string 
     */
    public function getWynikBadania()
    {
        return $this->wynikBadania;
    }

    /**
     * Set papierosy
     *
     * @param \App\Badanie\PapierosyBundle\Entity\Papierosy $papierosy
     * @return Badanie
     */
    public function setPapierosy(Papierosy $papierosy = null)
    {
        $this->papierosy = $papierosy;
        $papierosy->setBadanie($this);
    
        return $this;
    }

    /**
     * Get papierosy
     *
     * @return \App\Badanie\PapierosyBundle\Entity\Papierosy 
     */
    public function getPapierosy()
    {
        return $this->papierosy;
    }
}
