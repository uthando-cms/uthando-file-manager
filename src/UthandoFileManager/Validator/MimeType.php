<?php
/**
 * Created by PhpStorm.
 * User: shaun
 * Date: 04/11/14
 * Time: 13:43
 */

namespace UthandoFileManager\Validator;

use Zend\Validator\File\MimeType as ZendMimeType;

class MimeType extends ZendMimeType
{
    protected $magicFiles = [];
} 