<?php
namespace UthandoFileManager\Service;

use UthandoCommon\Service\AbstractService;
use UthandoFileManager\Option\FileManagerOptions;

class Uploader extends AbstractService
{
    const DIR_NOT_WRITABLE      = 'DirNotWritable';
    const FILE_EXISTS           = 'FileAlreadyExists';
    const MAX_WIDTH             = 'MaxWidth';
    const MAX_HEIGHT            = 'MaxHeight';
    const MIN_WIDTH             = 'MinHeight';
    const MIN_HEIGHT            = 'MinHeight';
    const NO_RESIZE             = 'NoResize';

    const MIME_NOT_SUPPORTED    = 'MimeNotSupported';

    protected $messageTemplates = [
        UPLOAD_ERR_INI_SIZE         => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE        => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the
        HTML form',
        UPLOAD_ERR_PARTIAL          => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE          => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR       => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE       => 'Failed to write file to disk',
        UPLOAD_ERR_EXTENSION        => 'File upload stopped by extension',

        self::DIR_NOT_WRITABLE      => 'Directory not writable: %s',
        self::FILE_EXISTS           => 'File already exists: %s - Options do not allow to overwrite',
        self::MAX_WIDTH             => 'Image exceeds max width: %s',
        self::MAX_HEIGHT            => 'Image exceeds max height: %s',
        self::MIN_WIDTH             => 'Image is below the min width: %s',
        self::MIN_HEIGHT            => 'Image is below the min height: %s',
        self::NO_RESIZE             => '%s - Options do not allow resize',

        self::MIME_NOT_SUPPORTED    => 'Image type %s is not supported for resizing.'
    ];

    /**
     * @var FileManagerOptions
     */
    protected $options;

    /**
     * @param string $error
     * @param string|null $args
     * @return string
     */
    public function error($error, $args = null)
    {
        if (null === $args) {
            $message = $this->messageTemplates[$error];
        } else {
            $message = sprintf($this->messageTemplates[$error], $args);
        }

        return $message;
    }

    /**
     * @param FileManagerOptions $options
     */
    public function setOptions(FileManagerOptions $options)
    {
        $this->options = $options;
    }

    /**
     * @return FileManagerOptions
     */
    public function getOptions()
    {
        return $this->options;
    }
} 