<?php

declare(strict_types=1);

return [
    'config-plugin' => [
        // Application params Yii Tools
        'application-params' => '?application-params.php',

        // Configuration Yii3
        'params' => 'params.php',
        'params-web' => ['$params'],
        'params-console' => ['$params'],
        'di' => [
            'common/*.php',
        ],
        'di-web' => [
            '$di',
            'web/*.php',
        ],
        'di-console' => [
            '$di',
            'console/*.php',
        ],
        'bootstrap' => '?bootstrap.php',
        'bootstrap-web' => '$bootstrap',
        'bootstrap-console' => '$bootstrap',
        'events' => [],
        'events-web' => ['$events'],
        'events-console' => ['$events'],
        'routes' => 'routes.php',
    ],
    'config-plugin-options' => [
        'source-directory' => 'config',
        'vendor-override-layer' => [
            'yii-tools/contact-form',
        ],
    ],
];
