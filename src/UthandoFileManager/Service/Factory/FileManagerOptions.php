<?php

namespace UthandoFileManager\Service\Factory;

use UthandoFileManager\Options\FileManagerOptions as Options;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class FileManagerOptions implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $options = isset($config['uthando_file_manager']) ? $config['uthando_file_manager'] : [];

        return new Options($options);
    }
} 