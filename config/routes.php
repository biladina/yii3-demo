<?php

declare(strict_types=1);

use Yii\Demo\Controller\SiteController;
use Yiisoft\Router\Route;

return [
    Route::get('/')->action([SiteController::class, 'index'])->name('home'),
];
