<?php

namespace BS\CLI\Factory;

use BS\CLI\ServiceLocatorAwareInterface;
use Zend\Mvc\Controller\AbstractController;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;
use Interop\Container\ContainerInterface;

class ControllerAbstractFactory implements AbstractFactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $instance = new $requestedName();

        if ($instance instanceof ServiceLocatorAwareInterface) {
            $instance->setServiceLocator($container);
        }

        return $instance;
    }

    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (class_exists($requestedName)) {
            if (array_key_exists(AbstractController::class, class_parents($requestedName))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}