<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Controller;

use UthandoFileManager\Options\ElfinderOptions;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class FileManagerController
 *
 * @package UthandoFileManager\Controller
 */
class FileManagerController extends AbstractActionController
{
    public function indexAction()
    {
        return [];
    }

    public static function access($attr, $path, $data, $volume, $isDir, $relpath)
    {
        $basename = basename($path);

        return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
            && strlen($relpath) !== 1           // but with out volume root
                ? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
                :  null;
    }


    public function connectorAction(): void
    {
        /** @var ElfinderOptions $options */
        $options = $this->getServiceLocator()->get(ElfinderOptions::class);

        $connector = new \elFinderConnector(new \elFinder($options->getServerOptions()));

        $this->layout()->setTerminal(true);

        $connector->run();
    }
}
