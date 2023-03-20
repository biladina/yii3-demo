<?php

declare(strict_types=1);

use Yii\Component\Alert;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Session\Flash\FlashInterface;

/**
 * @var Aliases $aliases
 * @var FlashInterface $flash
 */

$flashMessages = $flash->getAll();
$html = [];

/** @var array $data */
foreach ($flashMessages as $type => $messages) {
    if (in_array($type, ['danger', 'dark', 'info', 'success', 'warning'], true) === true) {
        foreach ($messages as $message) {
            $body = $message['body'] ?? '';

            if ($body !== '') {
                $id = 'alert-dismissing-' . uniqid();
                $html[] = Alert::widget(file: $aliases->get("@snippet/flowbite/alert/dismissing/$type.php"))
                    ->body($body)
                    ->id($id)
                    ->toggleDataAttribute('dismiss-target', '#' . $id)
                    ->render();
            }
        }
    }
}
?>

<div>
    <?= implode(PHP_EOL, $html); ?>
</div>
