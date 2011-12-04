<?php

require_once PHP_UTF8_DIR.'/functions/strcspn.php';


class Utf8StrcspnTest extends PHPUnit_Framework_TestCase
{
	public function test_no_match_single_byte_search()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$this->assertEquals(2, utf8_strcspn($str, 't'));
	}

	protected function tes_no_match_multi_byte_search()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$this->assertEquals(6, utf8_strcspn($str, 'â'));
	}

	public function test_compare_strspn()
	{
		$str = 'aeioustr';
		$this->assertEquals(strcspn($str, 'tr'), utf8_strcspn($str, 'tr'));
	}

	public function test_match_ascii()
	{
		$str = 'internationalization';
		$this->assertEquals(strcspn($str, 'a'), utf8_strcspn($str, 'a'));
	}

	public function test_linefeed()
	{
		$str = "i\nñtërnâtiônàlizætiøn";
		$this->assertEquals(3, utf8_strcspn($str, 't'));
	}

	public function test_linefeed_mask()
	{
		$str = "i\nñtërnâtiônàlizætiøn";
		$this->assertEquals(1, utf8_strcspn($str, "\n"));
	}
}
