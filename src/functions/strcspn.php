<?php

namespace utf8;

/**
 * UTF-8 aware alternative to strcspn.
 *
 * Find length of initial segment not matching mask.
 *
 * @package    php-utf-8
 * @subpackage functions
 * @see        http://www.php.net/strcspn
 * @uses       utf8_strlen
 * @uses       utf8_substr
 *
 * @param string  $str
 * @param string  $mask
 * @param integer $start
 * @param integer $length
 *
 * @return integer|null
 */
function cspn($str, $mask, $start = null, $length = null)
{
    if (empty($mask) || strlen($mask) == 0) {
        return null;
    }

    $mask = preg_replace('!([\\\\\\-\\]\\[/^])!', '\\\${1}', $mask);

    if ($start !== null || $length !== null) {
        $str = sub($str, $start, $length);
    }

    preg_match('/^[^' . $mask . ']+/u', $str, $matches);

    if (isset($matches[0])) {
        return len($matches[0]);
    }

    return 0;
}
