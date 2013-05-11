<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pdawczak
 * Date: 17.04.2013
 * Time: 19:44
 * To change this template use File | Settings | File Templates.
 */

namespace App\PacjentBundle\Extension;


use App\PacjentBundle\Entity\Pacjent;

class PacjentFormatter extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'wiek' => new \Twig_Filter_Method($this, 'renderWiek', array('is_safe' => array('html'))),
        );
    }

    /**
     * @param $obj
     * @return string
     * @throws \Exception
     */
    public function renderWiek($obj = null)
    {
        if (empty ($obj)) {
            return '';
        }

        if ($obj instanceof Pacjent) {
            $obj = $obj->getDataUrodzenia();
        }

        if (! $obj instanceof \DateTime) {
            throw new \Exception(sprintf('Value of "%s" is not supported', gettype($obj)));
        }

        $now = new \DateTime();
        $wiek = $now->format('Y') - $obj->format('Y');

        return sprintf('(%sl.)', $wiek);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'pacjent_formatter';
    }
}
