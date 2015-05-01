<?php

namespace utf8;

/**
 * UTF-8 aware alternative to str_ireplace.
 *
 * Case-insensitive version of str_replace
 * This function is not fast and gets slower if $search/$replace is array.
 * It assumes that the lower and uppercase versions of a UTF-8 character will
 * have the same length in bytes which is currently true given the hash table
 * to strtoLower.
 *
 * @package    php-utf-8
 * @subpackage functions
 * @uses       utf8_strtoLower
 * @see        http://www.php.net/str_ireplace
 *
 * @param string $search
 * @param string $replace
 * @param string $str
 * @param int    $count
 *
 * @return string
 */
function ireplace($search, $replace, $str, $count = null)
{
    if (!is_array($search)) {
        $slen = strlen($search);

        if ($slen == 0) {
            return $str;
        }

        $lendif = strlen($replace) - strlen($search);
        $search = to_lower($search);

        $search = preg_quote($search);
        $lstr = to_lower($str);
        $i = 0;
        $matched = 0;

        while (preg_match('/(.*)' . $search . '/Us', $lstr, $matches)) {
            if ($i === $count) {
                break;
            }

            $mlen = strlen($matches[0]);
            $lstr = substr($lstr, $mlen);
            $str = substr_replace($str, $replace, $matched + strlen($matches[1]), $slen);
            $matched += $mlen + $lendif;
            $i++;
        }
        return $str;
    } else {
        foreach (array_keys($search) as $k) {
            if (is_array($replace)) {
                if (array_key_exists($k, $replace)) {
                    $str = ireplace($search[$k], $replace[$k], $str, $count);
                } else {
                    $str = ireplace($search[$k], '', $str, $count);
                }
            } else {
                $str = ireplace($search[$k], $replace, $str, $count);
            }
        }
        return $str;
    }
}
