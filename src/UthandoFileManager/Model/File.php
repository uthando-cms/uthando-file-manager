<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Model;

use UthandoCommon\Model\Model;
use UthandoCommon\Model\ModelInterface;

/**
 * Class File
 *
 * @package UthandoFileManager\Model
 */
class File implements ModelInterface
{
    use Model;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var string
     */
    protected $size;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $tempName;

    /**
     * @var int
     */
    protected $error;

    /**
     * @return string
     */
    function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param $fileName
     * @return $this
     */
    function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    function getSize()
    {
        return $this->size;
    }

    /**
     * @param $size
     * @return $this
     */
    function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return $this
     */
    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    function getTempName()
    {
        return $this->tempName;
    }

    /**
     * @param $tempName
     * @return $this
     */
    function setTempName($tempName)
    {
        $this->tempName = $tempName;
        return $this;
    }

    /**
     * @return int
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param int $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
} 