<?php

namespace utf8;

/**
 * UTF-8 aware alternative to ucfirst.
 *
 * Make a string's first character uppercase
 *
 * @package    php-utf-8
 * @subpackage functions
 * @see        http://www.php.net/ucfirst
 * @uses       utf8_strtoupper
 *
 * @param string $str
 *
 * @return string A string with the first character in Uppercase (if applicable).
 */
function ucfirst($str)
{
    switch (len($str)) {
        case 0:
            return '';
            break;
        case 1:
            return to_upper($str);
            break;
        default:
            preg_match('/^(.{1})(.*)$/us', $str, $matches);
            return to_upper($matches[1]) . $matches[2];
    }
}
