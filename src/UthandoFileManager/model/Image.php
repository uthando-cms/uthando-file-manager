<?php
namespace UthandoFileManager\Model;

class Image extends File
{
    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $height;

    /**
     * @var int
     */
    protected $mimeType;

    /**
     * @return string
     */
    function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     * @return $this
     */
    function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     * @return $this
     */
    function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param $mimeType
     * @return $this
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }
}
