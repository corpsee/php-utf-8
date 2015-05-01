<?php

namespace utf8;

/**
 * UTF-8 aware alternative to str_split.
 *
 * Convert a string to an array
 *
 * @package    php-utf-8
 * @subpackage functions
 * @see        http://www.php.net/str_split
 * @uses       utf8_strlen
 *
 * @param string $str       A UTF-8 encoded string
 * @param int    $split_len A number of characters to split string by
 *
 * @return string characters in string reverses
 */
function split($str, $split_len = 1)
{
    if (!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1) {
        return false;
    }

    $len = len($str);
    if ($len <= $split_len) {
        return array($str);
    }
    preg_match_all('/.{' . $split_len . '}|[^\x00]{1,' . $split_len . '}$/us', $str, $ar);

    return $ar[0];
}
