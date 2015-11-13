<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Validator
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Validator;

use Zend\Validator\File\MimeType as ZendMimeType;

/**
 * Class MimeType
 *
 * @package UthandoFileManager\Validator
 */
class MimeType extends ZendMimeType
{
    protected $magicFiles = [];
}
