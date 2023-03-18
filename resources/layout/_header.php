<?php

declare(strict_types=1);

use Yii\Component\Menu;
use Yii\Component\MenuItems;
use Yii\Component\NavBar;
use Yii\Component\Tag\Img;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var Aliases $aliases
 * @var CurrentRoute $currentRoute
 * @var UrlGeneratorInterface $urlGenerator
 * @var TranslatorInterface $translator
 */
$routeRequest = '';

if ($currentRoute->getUri() !== null) {
    $routeRequest = $currentRoute->getUri()->getPath();
}

$menuItems = [];
$items = $parameterService->get('app.menu');

foreach ($items as $key => $item) {
    $menuItems[] = MenuItems::create()
        ->label($item['label'])
        ->link($urlGenerator->generate($item['route'], ['_language' => $translator->getLocale()]));
}
?>

<?=
    NavBar::widget(file: $aliases->get('@app-snippet/navbar-flowbite.php'))
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
            Menu::widget(file: $aliases->get('@app-snippet/menu-flowbite.php'))
                ->currentPath($routeRequest)
                ->items(...$menuItems)
                ->id('navbar-default')
        )
        ->begin() ?>
<?= NavBar::end();

