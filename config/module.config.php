<?php
return [
    'asset_manager' => [
        'resolver_configs' => [
            'collections' => [
                'js/summernote.js' => [
                    'js/summernote-elfinder.js',
                ],
            ],
            'aliases' => [
                'el-finder/js/'             => './vendor/studio-42/elfinder/js/',
                'el-finder/css/'            => './vendor/studio-42/elfinder/css/',
                'el-finder/img/'            => './vendor/studio-42/elfinder/img/',
                'el-finder/sounds/'         => './vendor/studio-42/elfinder/sounds/',
            ],
            'paths' => [
                'UthandoFileManager' => __DIR__ . '/../public',
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'UthandoFileManager\Controller\FileManager'     => 'UthandoFileManager\Controller\FileManagerController',
            'UthandoFileManager\Controller\Settings'        => 'UthandoFileManager\Controller\SettingsController',
            'UthandoFileManager\Controller\Uploader'        => 'UthandoFileManager\Controller\UploaderController',
        ],
    ],
    'form_elements' => [
        'invokables' => [
            'UthandoFileManagerImage'               => 'UthandoFileManager\Form\Image',
            'UthandoFileManagerSettings'            => 'UthandoFileManager\Form\Settings',
            'UthandoFileManagerSettingsFieldSet'    => 'UthandoFileManager\Form\SettingsFieldSet',
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
    'view_helpers' => [
        'invokables' => [
            'FileManager' => \UthandoFileManager\View\FileManager::class,
        ]
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
