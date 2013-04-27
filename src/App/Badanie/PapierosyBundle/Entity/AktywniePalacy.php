<?php

namespace App\Badanie\PapierosyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AktywniePalacy
 *
 * @ORM\Table(name="papierosy_aktywnie_palacy")
 * @ORM\Entity
 */
class AktywniePalacy extends Papierosy
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
     * @var int
     *
     * @ORM\Column(name="ilosc_sztuk_dziennie", type="integer", nullable=true)
     */
    private $iloscSztukDziennie;

    /**
     * @var int
     *
     * @ORM\Column(name="okres_palenia", type="integer", nullable=true)
     */
    private $okresPalenia;

    /**
     * @var int Ile godzin przed badaniem
     *
     * @ORM\Column(name="ostatni_papieros", type="integer", nullable=true)
     */
    private $ostatniPapieros;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_zaprzestania", type="date", nullable=true)
     */
    private $dataZaprzestania;

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
     * Set iloscSztukDziennie
     *
     * @param integer $iloscSztukDziennie
     * @return AktywniePalacy
     */
    public function setIloscSztukDziennie($iloscSztukDziennie)
    {
        $this->iloscSztukDziennie = $iloscSztukDziennie;
    
        return $this;
    }

    /**
     * Get iloscSztukDziennie
     *
     * @return integer 
     */
    public function getIloscSztukDziennie()
    {
        return $this->iloscSztukDziennie;
    }

    /**
     * Set okresPalenia
     *
     * @param integer $okresPalenia
     * @return AktywniePalacy
     */
    public function setOkresPalenia($okresPalenia)
    {
        $this->okresPalenia = $okresPalenia;
    
        return $this;
    }

    /**
     * Get okresPalenia
     *
     * @return integer 
     */
    public function getOkresPalenia()
    {
        return $this->okresPalenia;
    }

    /**
     * Set ostatniPapieros
     *
     * @param integer $ostatniPapieros
     * @return AktywniePalacy
     */
    public function setOstatniPapieros($ostatniPapieros)
    {
        $this->ostatniPapieros = $ostatniPapieros;
    
        return $this;
    }

    /**
     * Get ostatniPapieros
     *
     * @return integer 
     */
    public function getOstatniPapieros()
    {
        return $this->ostatniPapieros;
    }

    /**
     * Set dataZaprzestania
     *
     * @param \DateTime $dataZaprzestania
     * @return AktywniePalacy
     */
    public function setDataZaprzestania($dataZaprzestania)
    {
        $this->dataZaprzestania = $dataZaprzestania;
    
        return $this;
    }

    /**
     * Get dataZaprzestania
     *
     * @return \DateTime 
     */
    public function getDataZaprzestania()
    {
        return $this->dataZaprzestania;
    }
}
