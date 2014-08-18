<?php
return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'guest' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoFileManager\Controller\FileManager' => ['action' => 'index'],
                            ]
                        ],
                    ],
                ],
                'registered' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoFileManager\Controller\FileManager' => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                'UthandoFileManager\Controller\FileManager',
            ],
        ],
    ],
    'router' => [
        'routes' => [
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
                    'default' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager'  => [
        'template_map' => include __DIR__ . '/../template_map.php'
    ],
];
