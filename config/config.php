<?php
return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoFileManager\Controller\AssetManager' => ['action' => 'all'],
                                'UthandoFileManager\Controller\FileManager' => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                'UthandoFileManager\Controller\AssetManager',
                'UthandoFileManager\Controller\FileManager',
            ],
        ],
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
                ],
            ],
        ],
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
