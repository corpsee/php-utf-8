<?php

namespace utf8;

/**
 * UTF-8 aware alternative to stristr.
 *
 * Find first occurrence of a string using case insensitive comparison.
 *
 * @package    php-utf-8
 * @subpackage functions
 * @see        http://www.php.net/strcasecmp
 * @uses       utf8_strtolower
 *
 * @param string $str
 * @param string $search
 *
 * @return integer|false
 */
function ifind($str, $search)
{
    if (strlen($search) == 0) {
        return $str;
    }

    $lstr = to_lower($str);
    $lsearch = to_lower($search);
    preg_match('/^(.*)' . preg_quote($lsearch) . '/Us', $lstr, $matches);

    if (count($matches) == 2) {
        return substr($str, strlen($matches[1]));
    }

    return false;
}
