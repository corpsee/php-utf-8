<?php

require_once UTF8.'/functions/strspn.php';


class Utf8StrspnTest extends TestLibTestCase
{
	protected $name = 'utf8_strspn()';

	function test_match()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$this->is_equal(utf8_strspn($str, 'âëiônñrt'), 11);
	}

	function test_match_two()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$this->is_equal(utf8_strspn($str, 'iñtë'), 4);
	}

	function test_compare_strspn()
	{
		$str = 'aeioustr';
		$this->is_equal(utf8_strspn($str, 'saeiou'), strspn($str, 'saeiou'));
	}

	function test_match_ascii()
	{
		$str = 'internationalization';
		$this->is_equal(utf8_strspn($str, 'aeionrt'), strspn($str, 'aeionrt'));
	}

	function test_linefeed()
	{
		$str = "iñtërnât\niônàlizætiøn";
		$this->is_equal(utf8_strspn($str, 'âëiônñrt'), 8);
	}

	function test_linefeed_mask()
	{
		$str = "iñtërnât\niônàlizætiøn";
		$this->is_equal(utf8_strspn($str, "âëiônñrt\n"), 12);
	}
}
