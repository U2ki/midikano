<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NEWS()
 * @method static static EVENT()
 */
final class NewsType extends Enum
{
    const NEWS =   0;
    const EVENT =   1;

    public static function getDescription($value): string
    {
        if ($value === self::NEWS) {
            return 'ニュース';
        }

        if ($value === self::EVENT) {
            return 'イベント';
        }

        return parent::getDescription($value);
    }

    public static function getValue(string $key)
    {
        if ($key === 'ニュース') {
            return self::NEWS;
        }

        if ($key === 'イベント') {
            return self::EVENT;
        }

        return parent::getValue($key);
    }
}
