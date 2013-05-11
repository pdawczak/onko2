<?php

namespace App\Badanie\PapierosyBundle\Entity;

use App\Badanie\PapierosyBundle\Form\Type\BierniePalacyType;
use Doctrine\ORM\Mapping as ORM;

/**
 * BierniePalacy
 *
 * @ORM\Table(name="papierosy_biernie_palacy")
 * @ORM\Entity
 */
class BierniePalacy extends Papierosy
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
     * @var string
     *
     * @ORM\Column(name="miejsce_narazenia", type="string", length=255, nullable=true)
     */
    private $miejsceNarazenia;

    /**
     * @var string
     *
     * @ORM\Column(name="czas_ekspozycji", type="string", length=255, nullable=true)
     */
    private $czasEkspozycji;

    /**
     * @var bool
     *
     * @ORM\Column(name="ostatnio_narazony", type="boolean", nullable=true)
     */
    private $ostatnioNarazony;

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
     * Set miejsceNarazenia
     *
     * @param string $miejsceNarazenia
     * @return BierniePalacy
     */
    public function setMiejsceNarazenia($miejsceNarazenia)
    {
        $this->miejsceNarazenia = $miejsceNarazenia;
    
        return $this;
    }

    /**
     * Get miejsceNarazenia
     *
     * @return string 
     */
    public function getMiejsceNarazenia()
    {
        return $this->miejsceNarazenia;
    }

    /**
     * Set czasEkspozycji
     *
     * @param string $czasEkspozycji
     * @return BierniePalacy
     */
    public function setCzasEkspozycji($czasEkspozycji)
    {
        $this->czasEkspozycji = $czasEkspozycji;
    
        return $this;
    }

    /**
     * Get czasEkspozycji
     *
     * @return string 
     */
    public function getCzasEkspozycji()
    {
        return $this->czasEkspozycji;
    }

    /**
     * Set ostatnioNarazony
     *
     * @param boolean $ostatnioNarazony
     * @return BierniePalacy
     */
    public function setOstatnioNarazony($ostatnioNarazony)
    {
        $this->ostatnioNarazony = $ostatnioNarazony;
    
        return $this;
    }

    /**
     * Get ostatnioNarazony
     *
     * @return boolean 
     */
    public function getOstatnioNarazony()
    {
        return $this->ostatnioNarazony;
    }

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    function getType()
    {
        return new BierniePalacyType();
    }

    /**
     * @return string
     */
    function getTemplate()
    {
        return 'AppBadaniePapierosyBundle:Default:partials/_bierniePalacy.html.twig';
    }
}
