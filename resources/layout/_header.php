<?php

declare(strict_types=1);

use Yii\Component\Menu;
use Yii\Component\MenuItems;
use Yii\Component\NavBar;
use Yii\Component\Tag\Img;
use Yii\Service\ParameterService;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var Aliases $aliases
 * @var CurrentRoute $currentRoute
 * @var ParameterService $parameters
 * @var UrlGeneratorInterface $urlGenerator
 * @var TranslatorInterface $translator
 */
$routeRequest = '';

if ($currentRoute->getUri() !== null) {
    $routeRequest = $currentRoute->getUri()->getPath();
}

$menuItems = [];
$items = $parameters->get('app.menu');

foreach ($items as $key => $item) {
    $menuItems[] = MenuItems::create()
        ->label($item['label'])
        ->link($urlGenerator->generate($item['route'], ['_language' => $translator->getLocale()]));
}
?>

<?=
    NavBar::widget(file: $aliases->get('@snippet/flowbite/navbar/default-navbar.php'))
        ->brandImage(
            Img::widget()
                ->alt('YiiFramework')
                ->class('h-6 mr-3 sm:h-9')
                ->src(
                    $parameters->get('app.theme') === 'dark'
                        ? 'https://www.yiiframework.com/image/design/logo/yii3_full_for_dark.svg'
                        : 'https://www.yiiframework.com/image/design/logo/yii3_full_for_light.svg'
                )
        )
        ->brandLink('https://www.yiiframework.com/')
        ->menu(
            Menu::widget(file: $aliases->get('@snippet/flowbite/navbar/menu/default-navbar.php'))
                ->currentPath($routeRequest)
                ->items(...$menuItems)
                ->id('navbar-default')
        )
        ->begin() ?>
<?= NavBar::end();
