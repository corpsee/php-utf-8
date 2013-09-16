<?php

namespace utf8;

/**
 * UTF-8 aware substr_replace.
 *
 * @package    php-utf8
 * @subpackage functions
 * @see        http://www.php.net/substr_replace
 * @uses       utf8_strlen
 * @uses       utf8_substr
 *
 * @param string $str
 * @param string $repl
 * @param int    $start
 * @param int    $length
 *
 * @return string
 */
function subReplace ($str, $repl, $start, $length = NULL)
{
	preg_match_all('/./us', $str, $ar);
	preg_match_all('/./us', $repl, $rar);

	$length = is_int($length) ? $length : len($str);

	array_splice($ar[0], $start, $length, $rar[0]);

	return implode($ar[0]);
}
