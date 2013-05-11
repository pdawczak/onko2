<?php

namespace App\Badanie\UzywkiBundle\Entity\Alkohol;

use App\Badanie\UzywkiBundle\Form\Type\Alkohol\PijacyType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pijacy
 *
 * @ORM\Table(name="alkohol_pijacy")
 * @ORM\Entity
 */
class Pijacy extends Alkohol
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
     * @ORM\Column(name="ilosc_jednostek_na_tydzien", type="integer", nullable=true)
     */
    private $iloscJednostekNaTydzien;

    /**
     * @var bool
     *
     * @ORM\Column(name="przed_badaniem", type="boolean")
     */
    private $przedBadaniem;

    /**
     * @var int
     *
     * @ORM\Column(name="ilosc_jednostek_przed_badaniem", type="integer", nullable=true)
     */
    private $iloscJednostekPrzedBadaniem;

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
     * @return \Symfony\Component\Form\AbstractType
     */
    public function getType()
    {
        return new PijacyType();
    }

    /**
     * Set iloscJednostekNaTydzien
     *
     * @param integer $iloscJednostekNaTydzien
     * @return Pijacy
     */
    public function setIloscJednostekNaTydzien($iloscJednostekNaTydzien)
    {
        $this->iloscJednostekNaTydzien = $iloscJednostekNaTydzien;
    
        return $this;
    }

    /**
     * Get iloscJednostekNaTydzien
     *
     * @return integer 
     */
    public function getIloscJednostekNaTydzien()
    {
        return $this->iloscJednostekNaTydzien;
    }

    /**
     * Set przedBadaniem
     *
     * @param boolean $przedBadaniem
     * @return Pijacy
     */
    public function setPrzedBadaniem($przedBadaniem)
    {
        $this->przedBadaniem = $przedBadaniem;
    
        return $this;
    }

    /**
     * Get przedBadaniem
     *
     * @return boolean 
     */
    public function getPrzedBadaniem()
    {
        return $this->przedBadaniem;
    }

    /**
     * Set iloscJednostekPrzedBadaniem
     *
     * @param integer $iloscJednostekPrzedBadaniem
     * @return Pijacy
     */
    public function setIloscJednostekPrzedBadaniem($iloscJednostekPrzedBadaniem)
    {
        $this->iloscJednostekPrzedBadaniem = $iloscJednostekPrzedBadaniem;
    
        return $this;
    }

    /**
     * Get iloscJednostekPrzedBadaniem
     *
     * @return integer 
     */
    public function getIloscJednostekPrzedBadaniem()
    {
        return $this->iloscJednostekPrzedBadaniem;
    }

    /**
     * Set dataZaprzestania
     *
     * @param \DateTime $dataZaprzestania
     * @return Pijacy
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

    /**
     * @return string
     */
    public function getTemplate()
    {
        return 'AppBadanieUzywkiBundle:Default:partials/_pijacy.html.twig';
    }
}
