<?php

namespace utf8;

/**
 * UTF-8 aware alternative to wordwrap.
 *
 * Wraps a string to a given number of characters
 *
 * @see        http://www.php.net/manual/en/function.wordwrap.php
 *
 * @param string  $str   the input string
 * @param int     $width the column width
 * @param string  $break the line is broken using the optional break parameter
 * @param boolean $cut
 *
 * @return string the given string wrapped at the specified column
 * @package    php-utf-8
 * @subpackage functions
 */
function wordwrap ($str, $width = 75, $break = "\n", $cut = FALSE)
{
	$width = (int)$width;
	$str     = explode($break, $str);

	$iLen    = count($str);
	$result  = array();
	$line    = '';
	$lineLen = 0;

	for ($i = 0; $i < $iLen; ++$i)
	{
		$words = explode(' ', $str[$i]);
		$line && $result[] = $line;
		$lineLen = len($line);
		$jLen    = count($words);

		for ($j = 0; $j < $jLen; ++$j)
		{
			$w    = $words[$j];
			$wLen = len($w);

			if ($lineLen + $wLen < $width)
			{
				if ($j)
					$line .= ' ';
				$line .= $w;
				$lineLen += $wLen + 1;
			}
			else
			{
				if ($j || $i)
					$result[] = $line;
				$line    = '';
				$lineLen = 0;

				if ($cut && $wLen > $width)
				{
					$w = split($w);

					do
					{
						$result[] = implode('', array_slice($w, 0, $width));
						$line     = implode('', $w = array_slice($w, $width));
						$lineLen  = $wLen -= $width;
					}
					while ($wLen > $width);
					$w = implode('', $w);
				}

				$line    = $w;
				$lineLen = $wLen;
			}
		}
	}
	$line && $result[] = $line;

	return implode($break, $result);
}
