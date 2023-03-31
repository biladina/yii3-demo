<?php

declare(strict_types=1);

use Yiisoft\Definitions\Reference;
use Yiisoft\Session\SessionInterface;
use Yiisoft\User\CurrentUser;

return [
    CurrentUser::class => [
        'withSession()' => [Reference::to(SessionInterface::class)],
        'reset' => fn () => $this->clear(),
    ],
];
