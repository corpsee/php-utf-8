<?php

namespace utf8;

/**
 * UTF-8 aware alternative to strcasecmp.
 *
 * A case insensivite string comparison
 *
 * @package    php-utf-8
 * @subpackage functions
 * @see        http://www.php.net/strcasecmp
 * @uses       utf8_strtolower
 *
 * @param string $str_x
 * @param string $str_y
 *
 * @return int
 */
function casecmp($str_x, $str_y)
{
    $str_x = to_lower($str_x);
    $str_y = to_lower($str_y);

    return strcmp($str_x, $str_y);
}
