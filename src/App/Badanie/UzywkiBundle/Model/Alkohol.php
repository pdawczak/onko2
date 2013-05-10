<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 07.05.2013
 * Time: 21:37
 * To change this template use File | Settings | File Templates.
 */

namespace App\Badanie\UzywkiBundle\Model;

use App\Badanie\UzywkiBundle\Entity\Alkohol\Alkohol as AlkoholEntity;
use App\Badanie\UzywkiBundle\Entity\Alkohol\Niepijacy;
use App\Badanie\UzywkiBundle\Entity\Alkohol\Pijacy;
use App\Badanie\UzywkiBundle\Form\Type\Alkohol\AlkoholType;

class Alkohol extends AlkoholEntity
{
    public static $kinds = array(
        'niepijacy' => 'Nie',
        'pijacy'    => 'Tak',
    );

    /**
     * @var string
     */
    private $kind;

    /**
     * @var Niepijacy
     */
    private $niepijacy;

    /**
     * @var Pijacy
     */
    private $pijacy;

    public function __construct(AlkoholEntity $entity = null)
    {
        $this->kind         = 'niepijacy';
        $this->niepijacy    = new Niepijacy();
        $this->pijacy       = new Pijacy();

        if ($entity) {
            if ($entity instanceof Niepijacy) {
                $this->niepijacy = $entity;
            }
            if ($entity instanceof Pijacy) {
                $this->kind   = 'pijacy';
                $this->pijacy = $entity;
            }
        }
    }

    public function setKind($kind = null)
    {
        $this->kind = $kind;

        return $this;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function setNiepijacy(Niepijacy $niepijacy = null)
    {
        $this->niepijacy = $niepijacy;

        return $this;
    }

    public function getNiepijacy()
    {
        return $this->niepijacy;
    }

    public function setPijacy(Pijacy $pijacy = null)
    {
        $this->pijacy = $pijacy;

        return $this;
    }

    public function getPijacy()
    {
        return $this->pijacy;
    }

    public function getModel()
    {
        $kind = $this->getKind();
        return $this->$kind;
    }

    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    public function getType()
    {
        return new AlkoholType();
    }
}
