<?php

namespace UthandoFileManager\Option;

use Zend\Stdlib\AbstractOptions;

class FileManagerOptions extends AbstractOptions
{
    /**
     * @var array
     */
    protected $allowFileTypes = ['jpg' => 'jpg', 'png' => 'png', 'gif' => 'gif'];

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
    protected $minHeight = 128;

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
     * @var string
     */
    protected $destination = '/tmp';

    /**
     * @var bool
     */
    protected $overwrite = false;

    /**
     * @param array $allowFileTypes
     */
    public function setAllowFileTypes($allowFileTypes)
    {
        $this->allowFileTypes = $allowFileTypes;
    }

    /**
     * @return array
     */
    public function getAllowFileTypes()
    {
        return $this->allowFileTypes;
    }

    /**
     * @param boolean $convertToDefault
     */
    public function setConvertToDefault($convertToDefault)
    {
        $this->convertToDefault = $convertToDefault;
    }

    /**
     * @return boolean
     */
    public function getConvertToDefault()
    {
        return $this->convertToDefault;
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
    public function getDefaultFileType()
    {
        return $this->defaultFileType;
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
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
    public function getMaxHeight()
    {
        return $this->maxHeight;
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
    public function getMaxWidth()
    {
        return $this->maxWidth;
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
    public function getMinHeight()
    {
        return $this->minHeight;
    }

    /**
     * @param int $minWidth
     */
    public function setMinWidth($minWidth)
    {
        $this->minWidth = $minWidth;
    }

    /**
     * @return int
     */
    public function getMinWidth()
    {
        return $this->minWidth;
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
    public function getOverwrite()
    {
        return $this->overwrite;
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
    public function getResizeOverSized()
    {
        return $this->resizeOverSized;
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
    public function getUseMax()
    {
        return $this->useMax;
    }

    /**
     * @param boolean $useMin
     */
    public function setUseMin($useMin)
    {
        $this->useMin = $useMin;
    }

    /**
     * @return boolean
     */
    public function getUseMin()
    {
        return $this->useMin;
    }
} 