<?php
return [
    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                'UthandoFileManager' => __DIR__ . '/../public',
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'UthandoFileManager\Controller\AssetManager'    => 'UthandoFileManager\Controller\AssetManagerController',
            'UthandoFileManager\Controller\FileManager'     => 'UthandoFileManager\Controller\FileManagerController',
            'UthandoFileManager\Controller\Uploader'        => 'UthandoFileManager\Controller\UploaderController',
        ],
    ],
    'form_elements' => [
        'invokables' => [
            'UthandoFileManagerImage' => 'UthandoFileManager\Form\Image',
        ],
    ],
    'hydrators' => [
        'invokables' => [
            'UthandoFileManagerImage' => 'UthandoFileManager\Hydrator\Image',
        ],
    ],
    'input_filters' => [
        'invokables' => [
            'UthandoFileManagerImage' => 'UthandoFileManager\InputFilter\Image',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'UthandoFileManager\Options\FileManager'    => 'UthandoFileManager\Service\Factory\FileManagerOptions',
        ],
    ],
    'uthando_models' => [
        'invokables' => [
            'UthandoFileManagerFile'    => 'UthandoFileManager\Model\File',
            'UthandoFileManagerImage'   => 'UthandoFileManager\Model\Image',
        ],
    ],
    'uthando_services' => [
        'invokables' => [
            'UthandoFileManagerImage'       => 'UthandoFileManager\Service\ImageUploader',
            'UthandoFileManagerUploader'    => 'UthandoFileManager\Service\Uploader',
        ]
    ],
    'validators' => [
        'invokables' => [
            'fileisimage'   => 'UthandoFileManager\Validator\IsImage',
            'filemimetype'  => 'UthandoFileManager\Validator\MimeType',
        ],
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
