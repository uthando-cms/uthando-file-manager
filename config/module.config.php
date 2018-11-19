<?php

use UthandoFileManager\Controller\FileManagerController;
use UthandoFileManager\Controller\SettingsController;
use UthandoFileManager\Controller\UploaderController;
use UthandoFileManager\Options\ElfinderOptions;
use UthandoFileManager\Options\FileManagerOptions;
use UthandoFileManager\Options\Service\ElfinderOptionsFactory;
use UthandoFileManager\Service\Factory\FileManagerOptionsFactory;
use UthandoFileManager\Service\ImageUploader;
use UthandoFileManager\Service\Uploader;
use UthandoFileManager\Validator\IsImage;
use UthandoFileManager\Validator\MimeType;
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
            FileManagerController::class    => FileManagerController::class,
            SettingsController::class       => SettingsController::class,
            UploaderController::class       => UploaderController::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            ElfinderOptions::class      => ElfinderOptionsFactory::class,
            FileManagerOptions::class   => FileManagerOptionsFactory::class,
        ],
    ],
    'uthando_services' => [
        'invokables' => [
            ImageUploader::class    => ImageUploader::class,
            Uploader::class         => Uploader::class,
        ]
    ],
    'validators' => [
        'aliases' => [
            'fileisimage'   => IsImage::class,
            'filemimetype'  => MimeType::class,
        ],
        'invokables' => [
            IsImage::class => IsImage::class,
            MimeType::class => MimeType::class,
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
