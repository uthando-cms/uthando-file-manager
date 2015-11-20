<?php

return [
    'navigation' => [
        'admin' => [
            'admin' => [
                'pages' => [
                    'settings' => [
                        'pages' => [
                            'file-manager-settings' => [
                                'label' => 'File Manager',
                                'action' => 'index',
                                'route' => 'admin/file-manager/settings',
                                'resource' => 'menu:admin',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
