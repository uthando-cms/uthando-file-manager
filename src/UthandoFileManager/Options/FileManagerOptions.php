<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Class FileManagerOptions
 *
 * @package UthandoFileManager\Options
 */
class FileManagerOptions extends AbstractOptions
{
    /**
     * @var array
     */
    protected $allowImageTypes = [
        'gif' => 'image/gif',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
    ];

    /**
     * @var bool
     */
    protected $caseSensitive = false;

    /**
     * @var string
     */
    protected $defaultFileType = 'jpg';

    /**
     * @var bool
     */
    protected $convertToDefault = false;

    /**
     * @var int
     */
    protected $maxHeight = 1024;

    /**
     * @var int
     */
    protected $maxWidth = 1024;

    /**
     * @var bool
     */
    protected $useMax = true;

    /**
     * @var int
     */
    protected $minHeight = 100;

    /**
     * @var int
     */
    protected $minWidth = 128;

    /**
     * @var bool
     */
    protected $useMin = true;

    /**
     * @var bool
     */
    protected $resizeOverSized = false;

    /**
     * @var int
     */
    protected $defaultFilePermissions = '644';

    /**
     * @var string
     */
    protected $destination = './public/userfiles/';

    /**
     * @var bool
     */
    protected $overwrite = false;

    /**
     * @var bool
     */
    protected $createThumbnail = false;

    /**
     * @var int
     */
    protected $thumbnailHeight = 300;

    /**
     * @var int
     */
    protected $thumbnailWidth = 300;

    /**
     * @return array
     */
    public function getAllowImageTypes()
    {
        return $this->allowImageTypes;
    }

    /**
     * @param array $allowImageTypes
     */
    public function setAllowImageTypes($allowImageTypes)
    {
        $this->allowImageTypes = $allowImageTypes;
    }

    /**
     * @return boolean $caseSensitive
     */
    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param boolean $caseSensitive
     * @return $this
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getConvertToDefault()
    {
        return $this->convertToDefault;
    }

    /**
     * @param boolean $convertToDefault
     */
    public function setConvertToDefault($convertToDefault)
    {
        $this->convertToDefault = $convertToDefault;
    }

    /**
     * @return string
     */
    public function getDefaultFileType()
    {
        return $this->defaultFileType;
    }

    /**
     * @param string $defaultFileType
     */
    public function setDefaultFileType($defaultFileType)
    {
        $this->defaultFileType = $defaultFileType;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return int
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * @param int $maxHeight
     */
    public function setMaxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;
    }

    /**
     * @return int
     */
    public function getMaxWidth()
    {
        return $this->maxWidth;
    }

    /**
     * @param int $maxWidth
     */
    public function setMaxWidth($maxWidth)
    {
        $this->maxWidth = $maxWidth;
    }

    /**
     * @return int
     */
    public function getMinHeight()
    {
        return $this->minHeight;
    }

    /**
     * @param int $minHeight
     */
    public function setMinHeight($minHeight)
    {
        $this->minHeight = $minHeight;
    }

    /**
     * @return int
     */
    public function getMinWidth()
    {
        return $this->minWidth;
    }

    /**
     * @param int $minWidth
     */
    public function setMinWidth($minWidth)
    {
        $this->minWidth = $minWidth;
    }

    /**
     * @return boolean
     */
    public function getOverwrite()
    {
        return $this->overwrite;
    }

    /**
     * @param boolean $overwrite
     */
    public function setOverwrite($overwrite)
    {
        $this->overwrite = $overwrite;
    }

    /**
     * @return boolean
     */
    public function getResizeOverSized()
    {
        return $this->resizeOverSized;
    }

    /**
     * @param boolean $resizeOverSized
     */
    public function setResizeOverSized($resizeOverSized)
    {
        $this->resizeOverSized = $resizeOverSized;
    }

    /**
     * @return boolean
     */
    public function getUseMax()
    {
        return $this->useMax;
    }

    /**
     * @param boolean $useMax
     */
    public function setUseMax($useMax)
    {
        $this->useMax = $useMax;
    }

    /**
     * @return boolean
     */
    public function getUseMin()
    {
        return $this->useMin;
    }

    /**
     * @param boolean $useMin
     */
    public function setUseMin($useMin)
    {
        $this->useMin = $useMin;
    }

    /**
     * @return string
     */
    public function getDefaultFilePermissions()
    {
        return $this->defaultFilePermissions;
    }

    /**
     * @param $defaultFilePermissions
     * @return $this
     */
    public function setDefaultFilePermissions($defaultFilePermissions)
    {
        $this->defaultFilePermissions = $defaultFilePermissions;
        return $this;
    }
} 