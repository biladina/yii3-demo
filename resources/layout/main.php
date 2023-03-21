<?php

declare(strict_types=1);

use Yii\Demo\Asset\AppAsset;
use Yii\Html\Helper\Encode;
use Yii\Service\ParameterService;
use Yiisoft\Assets\AssetManager;
use Yiisoft\I18n\Locale;
use Yiisoft\Session\Flash\FlashInterface;
use Yiisoft\View\WebView;

/**
 * @var string $content
 * @var AssetManager $assetManager
 * @var FlashInterface $flash
 * @var Locale $locale
 * @var ParameterService $parameters
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
        <?= $this->render('_head', ['parameters' => $parameters]) ?>
        <?php $this->beginBody() ?>
            <body
                class="flex flex-col h-screen bg-gray-200 justify-between dark:bg-gray-500"
                data-theme="<?= $parameters->get('app.theme') ?>"
            >
                <header>
                    <?= $this->render('_header') ?>
                    <?= $this->render('_alert', ['flash' => $flash]) ?>
                </header>
                <?= $content ?>
                <?= $this->render('_footer') ?>
            </body>
        <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>
