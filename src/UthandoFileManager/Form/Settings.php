<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Form;

use Zend\Form\Form;

/**
 * Class FileManagerSettings
 *
 * @package UthandoFileManager\Form
 */
class Settings extends Form
{
    /**
     * Set up elements
     */
    public function init()
    {
        $this->add([
            'type' => 'UthandoFileManagerSettingsFieldSet',
            'name' => 'options',
            'attributes' => [
                'class' => 'col-md-12',
            ],
            'options' => [
                //'use_as_base_fieldset' => true,
                'label' => 'File Manager Options',
            ],
        ]);

        $this->add([
            'name' => 'button-submit',
            'type' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'class' => 'btn-primary'
            ],
            'options' => [
                'label' => 'Save',
                'column-size' => 'md-6'
            ],
        ]);
    }
}
