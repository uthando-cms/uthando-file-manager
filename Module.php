<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager;

use UthandoCommon\Config\ConfigInterface;
use UthandoCommon\Config\ConfigTrait;
use UthandoSessionManager\Service\Factory\SessionManagerFactory;
use Zend\Http\Request;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 *
 * @package UthandoFileManager
 */
class Module implements ConfigInterface
{
    use ConfigTrait;

    /**
     * @param MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event)
    {
        $app            = $event->getApplication();
        $eventManager   = $app->getEventManager();

        $eventManager->attach(MvcEvent::EVENT_ROUTE, [$this, 'startSession'],100000);
    }

    /**
     * @param MvcEvent $event
     */
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
                        ->get(SessionManagerFactory::class);

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

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        );
    }
}
