<?php

return [
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'file-manager' => [
                        'type'    => 'Literal',
                        'options' => [
                            'route'    => '/file-manager',
                            'defaults' => [
                                '__NAMESPACE__' => 'UthandoFileManager\Controller',
                                'controller'    => 'FileManager',
                                'action'        => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'connector' => [
                                'type'    => 'Literal',
                                'options' => [
                                    'route'    => '/connector',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'UthandoFileManager\Controller',
                                        'controller'    => 'FileManager',
                                        'action'        => 'connector',
                                    ],
                                ],
                                'may_terminate' => true,
                            ],
                            'settings' => [
                                'type'    => 'Literal',
                                'options' => [
                                    'route'    => '/settings',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'UthandoFileManager\Controller',
                                        'controller'    => 'Settings',
                                        'action'        => 'index',
                                    ],
                                ],
                                'may_terminate' => true,
                            ],
                        ],
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
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
