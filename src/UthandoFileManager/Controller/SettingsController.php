<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Controller;

use UthandoCommon\Controller\SettingsTrait;
use UthandoFileManager\Form\FileManagerSettingsForm;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class SettingsController
 *
 * @package UthandoFileManager\Controller
 */
class SettingsController extends AbstractActionController
{
    use SettingsTrait;

    public function __construct()
    {
        $this->setFormName(FileManagerSettingsForm::class)
            ->setConfigKey('uthando_file_manager');
    }
}
