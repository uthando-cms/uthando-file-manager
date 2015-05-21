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

                if ($sid) {
                    $session = $event->getApplication()
                        ->getServiceManager()
                        ->get('UthandoSessionManager\SessionManager');

                    $session->setId($sid);
                }
            } catch(\Exception $e) {
                echo '<pre>';
                echo $e->getMessage();
                echo '</pre';
                exit();
            }
        }

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
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
