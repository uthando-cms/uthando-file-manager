<?php

namespace UthandoFileManager;

use Zend\Http\Request;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $event)
    {
        $app            = $event->getApplication();
        $eventManager   = $app->getEventManager();

        $eventManager->attach(MvcEvent::EVENT_ROUTE, [$this, 'startSession'],100000);
    }

    public function startSession(MvcEvent $event)
    {
        // this is for use when uploading via flash
        $request = $event->getRequest();

        if ($request instanceof Request && $request->isFlashRequest() && $request->isPost()) {
            try {
                $sid = $request->getPost('sid', null);

                if (sid) {
                    $session = $event->getApplication()
                        ->getServiceManager()
                        ->get('UthandoSessionManager\SessionManager');

                    $session->setId($sid);
                }
            } catch(Exception $e) {
                echo '<pre>';
                echo $e->getMessage();
                echo '</pre';
                exit();
            }
        }

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/config.php';
    }

    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controller.config.php';
    }

    public function getFormElementConfig()
    {
        return include __DIR__ . '/config/formElement.config.php';
    }

    public function getHydratorConfig()
    {
        return include __DIR__ . '/config/hydrator.config.php';
    }

    public function getInputFilterConfig()
    {
        return include __DIR__ . '/config/inputFilter.config.php';
    }

    public function getValidatorConfig()
    {
        return include __DIR__ . '/config/validator.config.php';
    }

    public function getUthandoModelConfig()
    {
        return include __DIR__ . '/config/model.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }
}
