<?php

namespace App\WebBundle\Form;

use Doctrine\ORM\EntityManager;

use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

class AppFormFactory
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var \Symfony\Component\Form\FormFactory
     */
    private $factory;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    private $request;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     * @param \Symfony\Component\Form\FormFactory $factory
     * @param Request $request
     */
    public function __construct(EntityManager $em, FormFactory $factory, Request $request)
    {
        $this->em       = $em;
        $this->factory  = $factory;
        $this->request  = $request;
    }

    /**
     * @param string $entity
     * @param mixed $data
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     * @throws \RuntimeException
     */
    public function getForm($entity, $data = null)
    {
        // Trying to find EntityFormFactory
        if ($factory = $this->guessFactoryClass($entity)) {
            return $factory->getForm($data);
        }

        // In case no EntityFormFactory, trying to instantiate AbstractType class
        if ($type = $this->guessTypeClass($entity)) {
            return $this->factory->create($type, $data);
        }

        throw new \RuntimeException(sprintf(
            'Can\'t create form. Tried to instantiate form for "%s", but no "%s" nor "%s" exists.',
            $entity, $this->factorizeName($entity), $this->typizeName($entity)
        ));
    }

    /**
     * @param $entity
     * @return EntityFormFactory
     * @throws \RuntimeException
     */
    public function getFormFactory($entity)
    {
        if ($factory = $this->guessFactoryClass($entity)) {
            return $factory;
        }

        throw new \RuntimeException(sprintf(
            'Can\'t create factory for "%s", "%s" doe\'s not exist.',
            $entity, $this->factorizeName($entity)
        ));
    }

    /**
     * @param string $entity
     * @return EntityFormFactory|null
     */
    private function guessFactoryClass($entity)
    {
        $name = $this->factorizeName($entity);

        if (class_exists($name)) {
            return new $name($this->factory, $this->request);
        }

        return null;
    }

    /**
     * @param string $entity
     * @return \Symfony\Component\Form\AbstractType|null
     */
    private function guessTypeClass($entity)
    {
        $name = $this->typizeName($entity);

        if (class_exists($name)) {
            return new $name();
        }

        return null;
    }

    /**
     * @param $entity
     * @return string
     */
    private function factorizeName($entity)
    {
        $name = $this->getName($entity);
        return  str_replace('\\Entity\\', '\\Form\\', $name) . 'FormFactory';
    }

    /**
     * @param $entity
     * @return string
     */
    private function typizeName($entity)
    {
        $name = $this->getName($entity);
        return  str_replace('\\Entity\\', '\\Form\\Type\\', $name) . 'Type';
    }

    /**
     * @param $entity
     * @return string
     */
    private function getName($entity)
    {
        return $this
            ->em
            ->getClassMetadata($entity)
            ->getName()
        ;
    }
}
