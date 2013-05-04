<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 01.05.2013
 * Time: 11:53
 * To change this template use File | Settings | File Templates.
 */

namespace App\Badanie\PapierosyBundle\Model;

use App\Badanie\BadanieBundle\Entity\Badanie;
use App\Badanie\PapierosyBundle\Entity\AktywniePalacy;
use App\Badanie\PapierosyBundle\Entity\BierniePalacy;
use App\Badanie\PapierosyBundle\Entity\Niepalacy;
use App\Badanie\PapierosyBundle\Entity\Papierosy as Entity;
use App\Badanie\PapierosyBundle\Form\Type\PapierosyType;

class Papierosy extends Entity
{
    /**
     * @var string
     */
    private $kind;

    /**
     * @var \App\Badanie\PapierosyBundle\Entity\Niepalacy
     */
    private $niepalacy;

    /**
     * @var \App\Badanie\PapierosyBundle\Entity\AktywniePalacy
     */
    private $aktywniePalacy;

    /**
     * @var \App\Badanie\PapierosyBundle\Entity\BierniePalacy
     */
    private $bierniePalacy;

    public function __construct(Badanie $badanie = null)
    {
        $this->kind             = 'niepalacy';
        $this->niepalacy        = new Niepalacy();
        $this->aktywniePalacy   = new AktywniePalacy();
        $this->bierniePalacy    = new BierniePalacy();

        if ($badanie) {
            $papierosy = $badanie->getPapierosy();
            if ($papierosy instanceof Niepalacy) {
                $this->niepalacy = $papierosy;
            }
            else if ($papierosy instanceof AktywniePalacy) {
                $this->kind           = 'aktywniePalacy';
                $this->aktywniePalacy = $papierosy;
            }
            else if ($papierosy instanceof BierniePalacy) {
                $this->kind          = 'bierniePalacy';
                $this->bierniePalacy = $papierosy;
            }
        }
    }

    /**
     * @param string $kind
     * @return Papierosy
     */
    public function setKind($kind = null)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param Niepalacy $niepalacy
     * @return Papierosy
     */
    public function setNiepalacy(Niepalacy $niepalacy = null)
    {
        $this->niepalacy = $niepalacy;

        return $this;
    }

    /**
     * @return Niepalacy
     */
    public function getNiepalacy()
    {
        return $this->niepalacy;
    }

    /**
     * @param AktywniePalacy $aktywniePalacy
     * @return Papierosy
     */
    public function setAktywniePalacy(AktywniePalacy $aktywniePalacy = null)
    {
        $this->aktywniePalacy = $aktywniePalacy;

        return $this;
    }

    /**
     * @return AktywniePalacy
     */
    public function getAktywniePalacy()
    {
        return $this->aktywniePalacy;
    }

    /**
     * @param BierniePalacy $bierniePalacy
     * @return Papierosy
     */
    public function setBierniePalacy(BierniePalacy $bierniePalacy = null)
    {
        $this->bierniePalacy = $bierniePalacy;

        return $this;
    }

    /**
     * @return BierniePalacy
     */
    public function getBierniePalacy()
    {
        return $this->bierniePalacy;
    }

    /**
     * @return \App\Badanie\PapierosyBundle\Entity\Papierosy
     */
    public function getEntity()
    {
        $var = $this->kind;
        return $this->$var;
    }

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    function getType()
    {
        return new PapierosyType();
    }
}
