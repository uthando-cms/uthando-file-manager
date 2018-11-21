<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 06/12/17 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoFileManager\Options\Factory;


use UthandoFileManager\Options\ElfinderOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ElfinderOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator): ElfinderOptions
    {
        $config = $serviceLocator->get('config');
        $options = $config['uthando_file_manager']['elfinder'] ?? [];

        return new ElfinderOptions($options);
    }
}
