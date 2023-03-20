<?php

declare(strict_types=1);

use Yiisoft\Session\Flash\Flash;
use Yiisoft\Session\Flash\FlashInterface;

/* @var $params array */

return [
    FlashInterface::class => [
        'class' => Flash::class,
        'reset' => static fn () => $this->flash->clear(),
    ],
];
