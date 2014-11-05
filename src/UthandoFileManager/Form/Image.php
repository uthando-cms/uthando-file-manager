<?php

namespace UthandoFileManager\Form;

use Zend\Form\Form;

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
            'options'		=> [
                'label'			=> 'Browse...',
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