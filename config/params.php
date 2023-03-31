<?php

declare(strict_types=1);

use Psr\Log\LogLevel;
use Yii\Demo\Command\Hello;
use Yii\Service\ParameterInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Cookies\CookieMiddleware;
use Yiisoft\Definitions\Reference;
use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\I18n\Locale;
use Yiisoft\Log\Target\File\FileTarget;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\FlashInterface;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\User\Login\Cookie\CookieLoginMiddleware;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    // Internationalization (i18n)
    'locale' => [
        'locale' => 'en',
        'locales' => ['en' => 'en-US', 'ru' => 'ru-RU', 'es' => 'es-ES'],
        'ignoredRequests' => [
            '/debug**',
        ],
    ],

    // Middlewares stack
    'middlewares' => [
        ErrorCatcher::class,
        SessionMiddleware::class,
        CookieMiddleware::class,
        CookieLoginMiddleware::class,
        \Yiisoft\Yii\Middleware\Locale::class,
        Router::class,
    ],

    // Aliases
    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => dirname(__DIR__, 1),
            '@assets' => '@root/public/assets',
            '@assetsUrl' => '@baseUrl/assets',
            '@baseUrl' => '/',
            '@layout' => '@resources/layout',
            '@messages' => '@resources/messages',
            '@npm' => '@root/node_modules',
            '@public' => '@root/public',
            '@resources' => '@root/resources',
            '@runtime' => '@root/runtime',
            '@app-snippet' => '@resources/snippet',
            '@vendor' => '@root/vendor',
            '@views' => '@resources/views',
        ],
    ],

    // Log
    'yiisoft/log' => [
        'targets' => [
            FileTarget::class,
        ],
    ],

    // Log target file
    'yiisoft/log-target-file' => [
        'fileTarget' => [
            'file' => '@runtime/logs/app.log',
            'levels' => [
                LogLevel::EMERGENCY,
                LogLevel::ERROR,
                LogLevel::WARNING,
                LogLevel::INFO,
                LogLevel::DEBUG,
            ],
            'dirMode' => 0755,
            'fileMode' => null,
        ],
        'fileRotator' => [
            'maxFileSize' => 10240,
            'maxFiles' => 5,
            'fileMode' => null,
            'compressRotatedFiles' => false,
        ],
    ],

    // Translator
    'yiisoft/translator' => [
        'locale' => 'en',
        'fallbackLocale' => 'en',
        'defaultCategory' => 'app',
    ],

    // View
    'yiisoft/view' => [
        'basePath' => '@views',
        'parameters' => [
            'aliases' => Reference::to(Aliases::class),
            'assetManager' => Reference::to(AssetManager::class),
            'currentRoute' => Reference::to(CurrentRoute::class),
            'flash' => Reference::to(FlashInterface::class),
            'locale' => Reference::to(Locale::class),
            'parameter' => Reference::to(ParameterInterface::class),
            'translator' => Reference::to(TranslatorInterface::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
        ],
    ],

    // Yii view
    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CsrfViewInjection::class),
        ],
        'layout' => '@layout/main',
        'viewPath' => '@views',
    ],

    // Yii console
    'yiisoft/yii-console' => [
        'commands' => [
            'hello' => Hello::class,
        ],
    ],
];
