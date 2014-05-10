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
                    // Change this to something specific to your module
                    'route'    => '/file-manager',
                    'defaults' => [
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'UthandoFileManager\Controller',
                        'controller'    => 'FileManager',
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
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
