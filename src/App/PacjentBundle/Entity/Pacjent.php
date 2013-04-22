<?php

namespace App\PacjentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

use App\Badanie\BadanieBundle\Entity\Badanie;

/**
 * Pacjent
 *
 * @ORM\Table(name="pacjenci")
 * @ORM\Entity(repositoryClass="App\PacjentBundle\Repository\PacjentRepository")
 */
class Pacjent
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
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Assert\NotBlank()
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\NotBlank()
     */
    private $nazwisko;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_urodzenia", type="date", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $dataUrodzenia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1, nullable=true)
     * @Assert\NotBlank()
     */
    private $plec;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $wzrost;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $waga;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1, nullable=true)
     * @Assert\NotBlank()
     */
    private $reka;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Badanie\BadanieBundle\Entity\Badanie", mappedBy="pacjent")
     */
    private $badania;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->badania = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getImie() . ' ' . $this->getNazwisko();
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
     * Set imie
     *
     * @param string $imie
     * @return Pacjent
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    
        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Pacjent
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    
        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set dataUrodzenia
     *
     * @param \DateTime $dataUrodzenia
     * @return Pacjent
     */
    public function setDataUrodzenia($dataUrodzenia)
    {
        $this->dataUrodzenia = $dataUrodzenia;
    
        return $this;
    }

    /**
     * Get dataUrodzenia
     *
     * @return \DateTime 
     */
    public function getDataUrodzenia()
    {
        return $this->dataUrodzenia;
    }

    /**
     * Set plec
     *
     * @param string $plec
     * @return Pacjent
     */
    public function setPlec($plec)
    {
        $this->plec = $plec;
    
        return $this;
    }

    /**
     * Get plec
     *
     * @return string 
     */
    public function getPlec()
    {
        return $this->plec;
    }

    /**
     * Set wzrost
     *
     * @param integer $wzrost
     * @return Pacjent
     */
    public function setWzrost($wzrost)
    {
        $this->wzrost = $wzrost;
    
        return $this;
    }

    /**
     * Get wzrost
     *
     * @return integer 
     */
    public function getWzrost()
    {
        return $this->wzrost;
    }

    /**
     * Set waga
     *
     * @param integer $waga
     * @return Pacjent
     */
    public function setWaga($waga)
    {
        $this->waga = $waga;
    
        return $this;
    }

    /**
     * Get waga
     *
     * @return integer 
     */
    public function getWaga()
    {
        return $this->waga;
    }

    /**
     * Set reka
     *
     * @param string $reka
     * @return Pacjent
     */
    public function setReka($reka)
    {
        $this->reka = $reka;
    
        return $this;
    }

    /**
     * Get reka
     *
     * @return string 
     */
    public function getReka()
    {
        return $this->reka;
    }

    /**
     * Set wagaKg
     *
     * @param null $wagaKg
     * @return $this
     */
    public function setWagaKg($wagaKg = null)
    {
        $this->waga = $wagaKg * 100;

        return $this;
    }

    /**
     * Get wagaKg
     *
     * @return float
     */
    public function getWagaKg()
    {
        return $this->waga / 100;
    }
    
    /**
     * Add badanie
     *
     * @param \App\Badanie\BadanieBundle\Entity\Badanie $badanie
     * @return Pacjent
     */
    public function addBadania(Badanie $badanie)
    {
        $this->badania[] = $badanie;
        $badanie->setPacjent($this);
    
        return $this;
    }

    /**
     * Remove badanie
     *
     * @param \App\Badanie\BadanieBundle\Entity\Badanie $badanie
     */
    public function removeBadania(Badanie $badanie)
    {
        $this->badania->removeElement($badanie);
    }

    /**
     * Get badania
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBadania()
    {
        return $this->badania;
    }
}
