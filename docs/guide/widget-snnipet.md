# Widget snippet

Allow create widgets using a snippet (file configuration).

The following code shows how to create a navbar for the flowbite theme.

navbar-flowbite-default.php

```php
<?php

declare(strict_types=1);

return [
    'brandLink()' => ['https://www.yiiframework.com/'],
    'brandLinkClass()' => ['flex items-center'],
    'class()' => ['bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900'],
    'menuClass()' => ['container flex flex-wrap items-center justify-between mx-auto'],
    'toggleClass()' => [
        'inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600'
    ],
    'toggleId()' => ['navbar-default'],
]
```

menu-flowbite-default.php

```php
<?php

declare(strict_types=1);

return [
    'activeClass()' => [
        'block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white',
    ],
    'class()' => ['hidden w-full md:block md:w-auto'],
    'linkClass()' => [
        'block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'
    ],
    'ulClass()' => [
        'flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700'
    ],    
]
```

In the view file:

```php
<?php

declare(strict_types=1);

use Yii\Component\Menu;
use Yii\Component\MenuItems;
use Yii\Component\NavBar;
use Yii\Component\Tag\Img;

/**
 * @var \Yiisoft\Aliases\Aliases $aliases
 * @var \Yiisoft\Router\UrlGeneratorInterface $urlGenerator
 * @var \Yiisoft\View\WebView $this
 */
?>

<?=
    NavBar::widget(file: $aliases->get('@app-snippet/navbar-flowbite-default.php'))
        ->brandImage(
            Img::widget()
                ->alt('YiiFramework')
                ->class('h-6 mr-3 sm:h-9')
                ->src(
                    $parameterService->get('app.theme') === 'dark'
                        ? 'https://www.yiiframework.com/image/design/logo/yii3_full_for_dark.svg'
                        : 'https://www.yiiframework.com/image/design/logo/yii3_full_for_light.svg'
                )
        )
        ->menu(
            Menu::widget(file: $aliases->get('@app-snippet/menu-flowbite-default.php'))
                ->currentPath($routeRequest)
                ->items(MenuItems::create()->label('Home')->link($urlGenerator->generate('home')))
                ->id('navbar-default')
        )
        ->begin()
?>        
```
