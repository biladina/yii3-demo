<?php

declare(strict_types=1);

use Yii\Demo\Handler\NotFoundHandler;
use Yiisoft\Definitions\DynamicReference;
use Yiisoft\Definitions\Reference;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;

/** @var array $params */

return [
    \Yiisoft\Yii\Http\Application::class => [
        '__construct()' => [
            'dispatcher' => DynamicReference::to(
                [
                    'class' => MiddlewareDispatcher::class,
                    'withMiddlewares()' => [$params['middlewares']],
                ],
            ),
            'fallbackHandler' => Reference::to(NotFoundHandler::class),
        ],
    ],

    \Yiisoft\Yii\Middleware\Locale::class => [
        '__construct()' => [
            'locales' => $params['locale']['locales'],
            'ignoredRequests' => $params['locale']['ignoredRequests'],
        ],
    ],
];
