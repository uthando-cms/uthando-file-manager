<?php

use UthandoFileManager\Form\ElfinderFieldSet;
use UthandoFileManager\Form\FileManagerSettingsForm;
use UthandoFileManager\Form\LegacyFieldSet;
use UthandoFileManager\Options\ElfinderOptions;
use UthandoFileManager\Options\FileManagerOptions;
use UthandoFileManager\Options\Service\ElfinderOptionsFactory;
use UthandoFileManager\Service\Factory\FileManagerOptionsFactory;
use UthandoFileManager\View\FileManager;

return [
    'asset_manager' => [
        'resolver_configs' => [
            'collections' => [
                'js/legacy-upload.js' => [
                    'js/jquery.ui.widget.js',
                    'js/jquery.iframe-transport.js',
                    'js/jquery.fileupload.js',
                ],
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
            ElfinderFieldSet::class         => ElfinderFieldSet::class,
            'UthandoFileManagerImage'       => 'UthandoFileManager\Form\Image',
            FileManagerSettingsForm::class  => FileManagerSettingsForm::class,
            LegacyFieldSet::class           => LegacyFieldSet::class,
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
        'aliases' => [
            'UthandoFileManager\Options\FileManager'    => FileManagerOptions::class,
        ],
        'factories' => [
            ElfinderOptions::class      => ElfinderOptionsFactory::class,
            FileManagerOptions::class   => FileManagerOptionsFactory::class,
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
        'aliases' => [
            'fileManager' => FileManager::class,
        ],
        'invokables' => [
            FileManager::class => FileManager::class,
        ]
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
