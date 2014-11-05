<?php

return [
    'invokables' => [
        'UthandoFileManager\Service\ImageUploader'  => 'UthandoFileManager\Service\ImageUploader',
        'UthandoFileManager\Service\Uploader'       => 'UthandoFileManager\Service\Uploader',
    ],
    'factories' => [
        'UthandoFileManager\Options\FileManager'    => 'UthandoFileManager\Service\Factory\FileManagerOptions',
    ],
];