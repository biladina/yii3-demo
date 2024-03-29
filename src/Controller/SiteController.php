<?php

declare(strict_types=1);

namespace Yii\Demo\Controller;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\ViewRenderer;

/**
 * This SiteController class is used to handle site actions.
 */
final class SiteController
{
    public function __construct(private ViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer->withControllerName('site');
    }

    public function index(): ResponseInterface
    {
        return $this->viewRenderer->render('index');
    }
}
