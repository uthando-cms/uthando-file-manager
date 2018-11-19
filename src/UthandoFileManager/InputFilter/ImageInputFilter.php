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
use UthandoFileManager\Validator\IsImage;
use Zend\Filter\File\RenameUpload;
use Zend\InputFilter\InputFilter;
use Zend\Validator\File\Extension;
use Zend\Validator\File\ImageSize;
use Zend\Validator\File\UploadFile;

/**
 * Class Image
 *
 * @package UthandoFileManager\InputFilter
 */
class ImageInputFilter extends InputFilter
{
    public function addImageFile(FileManagerOptions $options)
    {
        $allowedExtensions = array_keys($options->getAllowImageTypes());
        $allowedMimeTypes = array_values($options->getAllowImageTypes());

        $this->add([
            'name' => 'fileupload',
            'required' => true,
            'validators' => [
                ['name' => UploadFile::class],
                ['name' => Extension::class, 'options' => [
                    'extension' => $allowedExtensions,
                    'case' => $options->getCaseSensitive(),
                ]],
            ],
            'filters' => [
                ['name' => RenameUpload::class, 'options' => [
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
                ->attachByName(ImageSize::class, $sizeOptions);
        }

        // some web hosts have disabled fileinfo, so we check it's there
        // first before adding FileIsImage validator as it depends
        // on SPL FileInfo or mime_content_type function.
        if (extension_loaded('fileinfo') || function_exists('mime_content_type')) {
            $this->get('fileupload')->getValidatorChain()
                ->attachByName(IsImage::class, [
                    'mimeType' => $allowedMimeTypes,
                ]);
        }
    }
} 