<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Form;

use Zend\Form\Form;

/**
 * Class Image
 *
 * @package UthandoFileManager\Form
 */
class Image extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'image-file',
            'type' => 'file',
            'attributes' => [
                'id' => 'image-file',
            ],
            'options' => [
                'label' => 'Browse...',
            ],
        ]);
    }

    public function addElements(array $elements)
    {
        foreach ($elements as $name => $value) {
            $this->add([
                'name' => $name,
                'type' => 'hidden',
                'attributes' => [
                    'value' => $value
                ],
            ]);
        }
    }
} 