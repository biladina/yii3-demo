<?php

declare(strict_types=1);

use Yii\Html\Helper\Encode;
use Yii\Service\ParameterService;
use Yiisoft\View\WebView;

/**
 * @var ParameterService $parameterService
 * @var WebView $this
 */
?>

<head>
    <meta charset="<?= Encode::content($parameterService->get('app.charset')) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Encode::content($this->getTitle()) ?></title>

    <?php $this->head() ?>
</head>
