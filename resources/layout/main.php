<?php

declare(strict_types=1);

use Yii\Demo\Asset\AppAsset;
use Yii\Html\Helper\Encode;
use Yii\Service\ParameterService;
use Yiisoft\Assets\AssetManager;
use Yiisoft\I18n\Locale;
use Yiisoft\View\WebView;

/**
 * @var string $content
 * @var ParameterService $parameterService
 * @var AssetManager $assetManager
 * @var Locale $locale
 * @var WebView $this
 */

$assetManager->register(AppAsset::class);

$this->addCssFiles($assetManager->getCssFiles());
$this->addCssStrings($assetManager->getCssStrings());
$this->addJsFiles($assetManager->getJsFiles());
$this->addJsStrings($assetManager->getJsStrings());
$this->addJsVars($assetManager->getJsVars());
?>

<?php $this->beginPage()?>
    <!DOCTYPE html>
    <html lang="<?= Encode::content($locale->language()) ?>">
        <?= $this->render('_head', ['parameterService' => $parameterService]) ?>
        <?= $this->render('_header') ?>
        <body
            class="flex flex-col h-screen bg-gray-200 justify-between dark:bg-gray-500"
            data-theme="<?= $parameterService->get('app.theme') ?>"
        >
            <?php $this->beginBody() ?>
                <?= $content ?>
                <?= $this->render('_footer') ?>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage() ?>
