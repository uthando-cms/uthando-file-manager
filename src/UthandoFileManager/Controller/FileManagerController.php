<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Controller;

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

    public function access($attr, $path, $data, $volume, $isDir, $relpath)
    {
        $basename = basename($path);

        return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
            && strlen($relpath) !== 1           // but with out volume root
                ? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
                :  null;
    }


    public function connectorAction()
    {
        $config = $this->getServiceLocator()
            ->get('config')['uthando_file_manager']['elfinder']['server_options'];

        \ChromePhp::info($config);

        $connector = new \elFinderConnector(new \elFinder($config));

        $this->layout()->setTerminal(true);

        $connector->run();
    }
}
