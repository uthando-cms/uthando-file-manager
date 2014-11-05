<?php

namespace UthandoFileManager\Validator;

use Zend\Validator\File\IsImage as ZendIsImage;

class IsImage extends ZendIsImage
{
    protected $magicFiles = [];
} 