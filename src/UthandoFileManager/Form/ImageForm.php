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

use Zend\Form\Element\File;
use Zend\Form\Element\Hidden;
use Zend\Form\Form;

/**
 * Class Image
 *
 * @package UthandoFileManager\Form
 */
class ImageForm extends Form
{
    public function init()
    {
        $postMax = min([
            ini_get('post_max_size'),
            ini_get('upload_max_filesize')
        ]);
        
        $this->add([
            'name' => 'fileupload',
            'type' => File::class,
            'attributes' => [
                'id' => 'fileupload',
            ],
            'options' => [
                'label' => 'Browse...',
                'help-block' => 'The largest file size you can upload is ' . $postMax,
            ],
        ]);
    }

    public function addElements(array $elements)
    {
        foreach ($elements as $name => $value) {
            $this->add([
                'name' => $name,
                'type' => Hidden::class,
                'attributes' => [
                    'value' => $value
                ],
            ]);
        }
    }
} 