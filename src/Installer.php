<?php

declare(strict_types=1);

namespace Yii\Demo;

use FilesystemIterator as FSIterator;
use RecursiveDirectoryIterator as DirIterator;
use RecursiveIteratorIterator as RIterator;

/**
 * This Installer class is used to handle post-update composer scripts.
 */
final class Installer
{
    /**
     * @psalm-suppress UndefinedClass
     */
    public static function postUpdate(): void
    {
        self::chmodRecursive('runtime', 0777);
        self::chmodRecursive('public/assets', 0777);
    }

    private static function chmodRecursive(string $path, int $mode): void
    {
        chmod($path, $mode);

        /** @psalm-var iterable<array-key, string> $iterator */
        $iterator = new RIterator(
            new DirIterator($path, FSIterator::SKIP_DOTS | FSIterator::CURRENT_AS_PATHNAME),
            RIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            chmod($item, $mode);
        }
    }

    public static function copyEnvFile(): void
    {
        if (!file_exists('.env')) {
            copy('.env.example', '.env');
        }
    }
}
