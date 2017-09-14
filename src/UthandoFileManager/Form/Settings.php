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
            'type' => LegacyFieldSet::class,
            'name' => 'options',
            'attributes' => [
                'class' => 'col-md-6',
            ],
            'options' => [
                //'use_as_base_fieldset' => true,
                'label' => 'Legacy Upload Options',
            ],
        ]);
    }
}
