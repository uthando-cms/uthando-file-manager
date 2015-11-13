<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\Service;

use UthandoCommon\Service\AbstractService;
use UthandoFileManager\Options\FileManagerOptions;

/**
 * Class Uploader
 *
 * @package UthandoFileManager\Service
 */
class Uploader extends AbstractService
{
    const DIR_NOT_WRITABLE  = 'DirNotWritable';
    const FILE_EXISTS       = 'FileAlreadyExists';

    protected $messageTemplates = [
        UPLOAD_ERR_INI_SIZE     => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE    => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the
        HTML form',
        UPLOAD_ERR_PARTIAL      => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE      => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR   => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE   => 'Failed to write file to disk',
        UPLOAD_ERR_EXTENSION    => 'File upload stopped by extension',
        self::DIR_NOT_WRITABLE  => 'Directory not writable: %s',
        self::FILE_EXISTS       => 'File already exists: %s - Options do not allow to overwrite',
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
     * @return FileManagerOptions
     */
    public function getOptions()
    {
        if (!$this->options instanceof FileManagerOptions) {
            $options = $this->getServiceLocator()->get('UthandoFileManager\Options\FileManager');
            $this->options = $options;
        }

        return $this->options;
    }
}
