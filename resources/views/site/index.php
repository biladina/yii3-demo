<?php

declare(strict_types=1);

use Yii\Service\ParameterService;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var ParameterService $parameter
 * @var TranslatorInterface $translator
 * @var WebView $this
 */

$this->setTitle($parameter->get('app.name'));
?>

<div class="text-center">
    <h1 class="dark:text-white"><?= $translator->translate('site.hello')?>!</h1>

    <p class="dark:text-white"><?= $translator->translate('site.start_with')?>!</p>

    <p>
        <a class="dark:text-white" href="https://github.com/yiisoft/docs/tree/master/guide/en" target="_blank" rel="noopener">
            <i><?= $translator->translate('site.guide_remind')?>.</i>
        </a>
    </p>
</div>
