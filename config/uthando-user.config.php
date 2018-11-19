<?php

use UthandoFileManager\Controller\FileManagerController;
use UthandoFileManager\Controller\SettingsController;
use UthandoFileManager\Controller\UploaderController;

return [
    'uthando_user' => [
        'acl' => [
            'roles' => [
                'admin' => [
                    'privileges' => [
                        'allow' => [
                            'controllers' => [
                                FileManagerController::class => ['action' => 'all'],
                                SettingsController::class => ['action' => 'all'],
                                UploaderController::class => ['action' => 'all'],
                            ],
                        ],
                    ],
                ],
            ],
            'resources' => [
                FileManagerController::class,
                SettingsController::class,
                UploaderController::class,
            ],
        ],
    ],
];
