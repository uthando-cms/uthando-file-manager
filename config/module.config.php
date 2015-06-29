<?php
return [
    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                'UthandoFileManager' => __DIR__ . '/../public',
            ],
        ],
    ],
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoFileManager\Controller\AssetManager' => ['action' => 'all'],
                                'UthandoFileManager\Controller\FileManager' => ['action' => 'all'],
                                'UthandoFileManager\Controller\Uploader' => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                'UthandoFileManager\Controller\AssetManager',
                'UthandoFileManager\Controller\FileManager',
                'UthandoFileManager\Controller\Uploader',
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
            'UthandoFileManagerImage'   => 'UthandoFileManager\Service\ImageUploader',
    '       UthandoFileManagerUploader' => 'UthandoFileManager\Service\Uploader',
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
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'file-manager' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/file-manager[/:action]',
                            'constraints' => [
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                '__NAMESPACE__' => 'UthandoFileManager\Controller',
                                'controller'    => 'FileManager',
                                'action'        => 'index',
                            ],
                        ],
                    ],
                    'asset-manager' => [
                        'type'      => 'Segment',
                        'options'   => [
                            'route' => '/asset-manager[/img/[yes][server]][/:action][/]',
                            'constraints' => [
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults'  => [
                                '__NAMESPACE__' => 'UthandoFileManager\Controller',
                                'controller'    => 'AssetManager',
                                'action'        => 'index',
                            ]
                        ]
                    ],
                    'uploader' => [
                        'type'      => 'Segment',
                        'options'   => [
                            'route' => '/uploader/:action[/id/:id]',
                            'constraints' => [
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults'  => [
                                '__NAMESPACE__' => 'UthandoFileManager\Controller',
                                'controller'    => 'Uploader',
                                'action'        => 'upload-form',
                            ]
                        ]
                    ],
                ],
            ],
        ],
    ],
];
