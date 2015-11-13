<?php

return [
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
