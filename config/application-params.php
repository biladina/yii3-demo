<?php

declare(strict_types=1);

return [
    // Parameter for the application.
    'app' => [
        'charset' => 'UTF-8',
        'name' => 'My Project',
        'theme' => 'dark', // light, dark
        'menu' => [
            'guest' => [
                ['label' => 'home', 'route' => 'home'],
            ],
        ],
    ],
];
