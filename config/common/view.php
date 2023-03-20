<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Definitions\DynamicReference;
use Yiisoft\Definitions\Reference;
use Yiisoft\View\View;

/** @var array $params */

return [
    View::class => [
        '__construct()' => [
            'basePath' => DynamicReference::to(
                static fn (Aliases $aliases) => $aliases->get($params['yiisoft/view']['basePath'])
            ),
        ],
        'setParameters()' => [
            $params['yiisoft/view']['parameters'],
        ],
        'reset' => function (ContainerInterface $container) use ($params) {
            /** @var View $this */
            $this->clear();

            $resolvedParams = [];

            foreach ($params['yiisoft/view']['parameters'] as $id => $value) {
                $resolvedParams[$id] = $value instanceof Reference ? $value->resolve($container) : $value;
            }

            $this->setParameters($resolvedParams);
        },
    ],
];
