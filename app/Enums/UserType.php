<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static GENERAL()
 * @method static static CONCERNED()
 * @method static static ADMINISTRATOR()
 */
final class UserType extends Enum
{
    const GENERAL =   0;
    const CONCERNED =   1;
    const ADMINISTRATOR = 2;

    public static function getDescription($value): string
    {
        if ($value === self::GENERAL) {
            return '一般';
        }

        if ($value === self::CONCERNED) {
            return '関係者';
        }

        if ($value === self::ADMINISTRATOR) {
            return '管理者';
        }

        return parent::getDescription($value);
    }

    public static function getValue(string $key)
    {
        if ($key === '一般') {
            return self::GENERAL;
        }

        if ($key === '関係者') {
            return self::CONCERNED;
        }

        if ($key === '管理者') {
            return self::ADMINISTRATOR;
        }

        return parent::getValue($key);
    }
}
