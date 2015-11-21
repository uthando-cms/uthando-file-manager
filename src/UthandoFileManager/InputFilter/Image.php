<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoFileManager\InputFilter
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoFileManager\InputFilter;

use UthandoFileManager\Options\FileManagerOptions;
use Zend\InputFilter\InputFilter;

/**
 * Class Image
 *
 * @package UthandoFileManager\InputFilter
 */
class Image extends InputFilter
{
    public function addImageFile(FileManagerOptions $options)
    {
        $allowedExtensions = array_keys($options->getAllowImageTypes());
        $allowedMimeTypes = array_values($options->getAllowImageTypes());

        $this->add([
            'name' => 'fileupload',
            'required' => true,
            'validators' => [
                ['name' => 'FileUploadFile'],
                ['name' => 'FileExtension', 'options' => [
                    'extension' => $allowedExtensions,
                    'case' => $options->getCaseSensitive(),
                ]],
            ],
            'filters' => [
                ['name' => 'FileRenameUpload', 'options' => [
                    'target' => $options->getDestination(),
                    'useUploadName' => true,
                    'useUploadExtension' => true,
                    'overwrite' => $options->getOverwrite(),
                ]],
            ],
        ]);

        if (false === $options->getResizeOverSized()) {
            $sizeOptions = [];

            if ($options->getUseMin()) {
                $sizeOptions['minWidth'] = $options->getMinWidth();
                $sizeOptions['minHeight'] = $options->getMinHeight();
            }

            if ($options->getUseMax()) {
                $sizeOptions['maxWidth'] = $options->getMaxWidth();
                $sizeOptions['maxHeight'] = $options->getMaxHeight();
            }

            $this->get('fileupload')->getValidatorChain()
                ->attachByName('FileImageSize', $sizeOptions);
        }

        // some web hosts have disabled fileinfo, so we check it's there
        // first before adding FileIsImage validator as it depends
        // on SPL FileInfo or mime_content_type function.
        if (extension_loaded('fileinfo') || function_exists('mime_content_type')) {
            $this->get('fileupload')->getValidatorChain()
                ->attachByName('FileIsImage', [
                    'mimeType' => $allowedMimeTypes,
                ]);
        }
    }
} 