<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Service\Factory
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Options\Factory;

use UthandoFileManager\Options\FileManagerOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class FileManagerOptions
 *
 * @package UthandoFileManager\Service\Factory
 */
class FileManagerOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator): FileManagerOptions
    {
        $config = $serviceLocator->get('config');
        $options = $config['uthando_file_manager']['options'] ?? [];

        return new FileManagerOptions($options);
    }
}
