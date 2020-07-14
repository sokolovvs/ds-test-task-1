<?php


namespace App\Util;


class StringUtils
{
    /**
     * Trim string. If trimmed value is empty then returns null, else - false
     *
     * @param $string
     *
     * @return string|null
     */
    public static function trimToNull($string): ?string
    {
        if (is_string($string)) {
            $string = trim($string);
        } else {
            $string = null;
        }

        return !empty($string) ? $string : null;
    }
}
