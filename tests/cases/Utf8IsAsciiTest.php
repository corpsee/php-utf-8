<?php

require_once dirname(__FILE__).'/../bootstrap.php';
require_once UTF8.'/utils/ascii.php';


class Utf8IsAsciiTest extends PHPUnit_Framework_TestCase
{
	public function test_utf8()
	{
		$str = 'testiñg';
		$this->assertFalse(utf8_is_ascii($str));
	}

	public function test_ascii()
	{
		$str = 'testing';
		$this->assertTrue(utf8_is_ascii($str));
	}

	public function test_invalid_char()
	{
		$str = "tes\xe9ting";
		$this->assertFalse(utf8_is_ascii($str));
	}

	public function test_empty_str()
	{
		$str = '';
		$this->assertTrue(utf8_is_ascii($str));
	}
}
