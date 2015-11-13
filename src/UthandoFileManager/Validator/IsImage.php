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

use Zend\Validator\File\IsImage as ZendIsImage;

/**
 * Class IsImage
 *
 * @package UthandoFileManager\Validator
 */
class IsImage extends ZendIsImage
{
    protected $magicFiles = [];
}
