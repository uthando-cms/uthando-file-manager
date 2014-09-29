<?php

namespace UthandoFileManager\InputFilter;

use Zend\InputFilter\Input;

class Image extends Input
{
    public function __construct()
    {
        $this->add([
            'name'          => 'image-file',
            'validators'    => [
                ['name'  => 'FileUpload'],
            ],
        ]);
    }
} 