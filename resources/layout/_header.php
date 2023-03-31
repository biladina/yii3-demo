<?php

declare(strict_types=1);

use Yii\Component\Menu;
use Yii\Component\MenuItems;
use Yii\Component\NavBar;
use Yii\Component\Tag\Img;
use Yii\Forms\Form;
use Yii\Forms\Input\Button;
use Yii\Service\ParameterService;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Http\Method;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\User\CurrentUser;

/**
 * @var Aliases $aliases
 * @var CurrentRoute $currentRoute
 * @var CurrentUser $identity
 * @var ParameterService $parameter
 * @var UrlGeneratorInterface $urlGenerator
 * @var TranslatorInterface $translator
 */
$routeRequest = '';

if ($currentRoute->getUri() !== null) {
    $routeRequest = $currentRoute->getUri()->getPath();
}

$button = '';
$menuItems = [];
$items = $parameter->get('app.menu.guest');

foreach ($items as $key => $item) {
    $menuItems[] = MenuItems::create()
        ->label($translator->translate($item['label'], category: 'app'))
        ->link($urlGenerator->generate($item['route'], ['_language' => $translator->getLocale()]));
}

if (isset($identity) && $identity instanceof IdentityInterface) {
    $menuItems = [];
    $items = $parameter->get('app.menu.logged');

    foreach ($items as $key => $item) {
        $menuItems[] = MenuItems::create()
            ->label($translator->translate($item['label'], category: 'app'))
            ->link($urlGenerator->generate($item['route'], ['_language' => $translator->getLocale()]));
    }

    $button = Form::widget()
        ->action($urlGenerator->generate('logout'))
        ->class('flex items-center justify-center')
        ->csrf($csrf)
        ->method(Method::POST)
        ->begin() .
            Button::widget(file: $aliases->get('@resources/snippet/flowbite-logout-button.php'))
                ->value('Logout (' . $identity->account->username . ')')
                ->type('submit') .
        Form::end();

    $menuItems[] = MenuItems::create()->label($button)->labelEncode(false);
}

?>

<?=
    NavBar::widget(file: $aliases->get('@snippet/flowbite/navbar/default-navbar.php'))
        ->brandImage(
            Img::widget()
                ->alt('YiiFramework')
                ->class('h-6 mr-3 sm:h-9')
                ->src(
                    $parameter->get('app.theme') === 'dark'
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
        ->toggleId('navbar-default')
        ->begin() ?>
<?= NavBar::end();
