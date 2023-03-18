# Dark mode

Dark mode is a feature that allows you to change the color scheme of the application to a dark one.

This is useful for users who prefer dark colors.

The dark mode is implemented using the [Flowbite](https://flowbite.com/) library.

The following code is used to enable dark mode in the application.

[Params](https://github.com/yii-tools/demo/blob/add-menu-demo/config/application-params.php)

```php
<?php

declare(strict_types=1);

return [
    // Parameter for the application.
    'app' => [
        // Application charset.
        'charset' => 'UTF-8',
        // Application name.
        'name' => 'My Project',
        // Application theme `dark` or `light`.
        'theme' => 'dark',
        // Apllication menu.
        'menu' => [
            0 => ['label' => 'Home', 'route' => 'home'],
        ]
    ],
];
```
