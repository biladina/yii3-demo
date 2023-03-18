<?php

declare(strict_types=1);

namespace Yii\Demo\Asset;

use Yiisoft\Assets\AssetBundle;

/**
 * This AppAsset class is used to register site assets.
 */
final class AppAsset extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@resources/asset';
    public array $css = ['css/app.css'];
    public array $js = ['js/app.js'];
    public array $depends = [
        \Yii\Fontawesome\Asset\AllCssCdnAsset::class,
    ];
}
