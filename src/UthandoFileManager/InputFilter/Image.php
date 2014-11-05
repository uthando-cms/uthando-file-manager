<?php

namespace UthandoFileManager\InputFilter;

use UthandoFileManager\Options\FileManagerOptions;
use Zend\InputFilter\InputFilter;

class Image extends InputFilter
{
    public function addImageFile(FileManagerOptions $options)
    {
        $allowedExtensions = array_keys($options->getAllowImageTypes());
        $allowedMimeTypes = array_values($options->getAllowImageTypes());

        $this->add([
            'name'          => 'image-file',
            'required'      => true,
            'validators'    => [
                ['name' => 'FileUploadFile'],
                ['name' => 'FileExtension', 'options' => [
                    'extension' => $allowedExtensions,
                    'case'      => true,
                ]],
                ['name' => 'FileIsImage', 'options' => [
                    'mimeType'  => $allowedMimeTypes,
                ]],
                ['name' => 'FileImageSize', 'options' => [
                    'minWidth'  => ($options->getUseMin()) ? $options->getMinWidth() : null,
                    'minHeight' => ($options->getUseMin()) ? $options->getMinHeight() : null,
                    'maxWidth'  => ($options->getUseMax()) ? $options->getMaxWidth() : null,
                    'maxHeight' => ($options->getUseMax()) ? $options->getMaxHeight() : null,
                ]],
            ],
            'filters' => [
                ['name' => 'FileRenameUpload', 'options' => [
                    'target'                => $options->getDestination(),
                    'useUploadName'         => true,
                    'useUploadExtension'    => true,
                    'overwrite'             => true,
                ]],
            ],
        ]);
    }
} 