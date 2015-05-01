<?php

namespace utf8;

/**
 * UTF-8 aware alternative to strspn.
 *
 * Find length of initial segment matching mask.
 *
 * @package    php-utf-8
 * @subpackage functions
 * @see        http://www.php.net/strspn
 * @uses       utf8_strlen
 * @uses       utf8_substr
 *
 * @param string  $str
 * @param string  $mask
 * @param integer $start
 * @param integer $length
 *
 * @return int
 */
function span($str, $mask, $start = null, $length = null)
{
    $mask = preg_replace('!([\\\\\\-\\]\\[/^])!', '\\\${1}', $mask);

    if ($start !== null || $length !== null) {
        $str = \utf8\sub($str, $start, $length);
    }

    preg_match('/^[' . $mask . ']+/u', $str, $matches);

    if (isset($matches[0])) {
        return \utf8\len($matches[0]);
    }

    return 0;
}
