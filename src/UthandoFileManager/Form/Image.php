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