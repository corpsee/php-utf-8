<?php
/**
 * The following functions assume mbstring internal encoding is set to UTF-8.
 *
 * @package php-utf8
 * @subpackage mbstring
 */

/**
 *  Define UTF8_CORE as required
 */
if (!defined('UTF8_CORE'))
	define('UTF8_CORE', TRUE);

/*
 * utf8_strpos() and utf8_strrpos() need utf8_bad_strip() to strip invalid
 * characters. Mbstring doesn't do this while the Native implementation does.
 */
require_once PHP_UTF8_DIR.'/utils/patterns.php';
require_once PHP_UTF8_DIR.'/utils/bad.php';

/**
 * Wrapper round mb_strlen.
 *
 * This function does not count bad bytes in the string - these are simply ignored.
 *
 * @param string $str UTF-8 string
 * @return int number of UTF-8 characters in string
 */
function utf8_strlen($str)
{
	return mb_strlen($str);
}

/**
 * Wrapper around mb_strpos.
 *
 * Find position of first occurrence of a string.
 *
 * @param string $str haystack
 * @param string $search needle (you should validate this with utf8_is_valid)
 * @param integer offset in characters (from left)
 * @return mixed integer position or FALSE on failure
 */
function utf8_strpos($str, $search, $offset = false)
{
	$str = utf8_bad_clean($str);

	if ($offset === false)
		return mb_strpos($str, $search);

	return mb_strpos($str, $search, $offset);
}

/**
 * Wrapper around mb_strrpos.
 *
 * Find position of last occurrence of a char in a string.
 *
 * @param string $str haystack
 * @param string $search needle (you should validate this with utf8_is_valid)
 * @param integer $offset (optional) offset (from left)
 * @return mixed integer position or FALSE on failure
 */
function utf8_strrpos($str, $search, $offset = false)
{
	$str = utf8_bad_clean($str);

	if (!$offset)
	{
		// Emulate behaviour of strrpos rather than raising warning
		if(empty($str))
			return false;

		return mb_strrpos($str, $search);
	}

	if (!is_int($offset))
	{
		trigger_error('utf8_strrpos expects parameter 3 to be long', E_USER_WARNING);
		return false;
	}

	$str = mb_substr($str, $offset);

	if (($pos = mb_strrpos($str, $search)) !== false)
		return $pos + $offset;

	return false;
}

/**
 * Wrapper around mb_substr.
 *
 * Return part of a string given character offset (and optionally length).
 *
 * @param string $str
 * @param integer $offset number of UTF-8 characters offset (from left)
 * @param integer $length (optional) length in UTF-8 characters from offset
 * @return mixed string or FALSE if failure
 */
function utf8_substr($str, $offset, $length = false)
{
	if ($length === false)
		return mb_substr($str, $offset);

	return mb_substr($str, $offset, $length);
}

/**
 * Wrapper around mb_strtolower.
 *
 * Make a string lowercase.
 *
 * The concept of a characters "case" only exists is some alphabets such as
 * Latin, Greek, Cyrillic, Armenian and archaic Georgian - it does not exist in
 * the Chinese alphabet, for example. See Unicode Standard Annex #21: Case Mappings.
 *
 * @param string $str
 * @return mixed either string in lowercase or FALSE is UTF-8 invalid
 */
function utf8_strtolower($str)
{
	return mb_strtolower($str);
}

/**
 * Wrapper around mb_strtoupper.
 *
 * Make a string uppercase.
 *
 * The concept of a characters "case" only exists is some alphabets such as
 * Latin, Greek, Cyrillic, Armenian and archaic Georgian - it does not exist in
 * the Chinese alphabet, for example. See Unicode Standard Annex #21: Case Mappings
 *
 * @param string
 * @return mixed either string in lowercase or FALSE is UTF-8 invalid
 */
function utf8_strtoupper($str)
{
	return mb_strtoupper($str);
}

/**
 * UTF-8 aware alternative to ucwords.
 *
 * Uppercase the first character of each word in a string using mb_convert_case.
 *
 * @see http://php.net/manual/en/function.ucwords.php
 * @see http://php.net/manual/en/function.mb-convert-case.php
 * @uses utf8_substr_replace
 * @uses utf8_strtoupper
 * @param string
 * @return string with first char of each word uppercase
 */
function utf8_ucwords($str)
{
	return mb_convert_case($str, MB_CASE_TITLE, 'UTF-8');
}
