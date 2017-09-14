<?php

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                'UthandoFileManager\Controller\FileManager' => ['action' => 'all'],
                                'UthandoFileManager\Controller\Settings' => ['action' => 'all'],
                                'UthandoFileManager\Controller\Uploader' => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                'UthandoFileManager\Controller\FileManager',
                'UthandoFileManager\Controller\Settings',
                'UthandoFileManager\Controller\Uploader',
            ],
        ],
    ],
];
