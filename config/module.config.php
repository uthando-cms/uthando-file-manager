<?php
return [
    'userAcl' => [
        'userRoles' => [
            'guest' => [
                'privileges' => [
                    'allow' => [
                        ['controller' => 'UthandoFileManager\Controller\FileManager', 'action' => 'index'],
                    ],
                ],
            ],
            'registered' => [
                'privileges' => [
                    'allow' => [
                        ['controller' => 'UthandoFileManager\Controller\FileManager', 'action' => 'all'],
                    ],
                ],
            ],
        ],
        'userResources' => [
            'UthandoFileManager\Controller\FileManager',
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
