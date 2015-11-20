<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Service\Factory;

use UthandoFileManager\Options\FileManagerOptions as Options;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class FileManagerOptions
 *
 * @package UthandoFileManager\Service\Factory
 */
class FileManagerOptions implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $options = (isset($config['uthando_file_manager']) && isset($config['uthando_file_manager']['options'])) ?
            $config['uthando_file_manager']['options'] : [];

        return new Options($options);
    }
}
