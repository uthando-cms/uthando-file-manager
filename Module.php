<?php

namespace UthandoFileManager;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getControllerConfig()
    {
        return [
            'invokables' => [
                'UthandoFileManager\Controller\FileManager' => 'UthandoFileManager\Controller\FileManagerController',
            ],
        ];
    }
}
