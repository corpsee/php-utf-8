<?php

require_once dirname(__FILE__).'/../bootstrap.php';

class Utf8StrrposTest extends PHPUnit_Framework_TestCase
{
	public function test_utf8()
	{
		$str = 'Iñtërnâtiônàlizætiøn';
		$this->assertEquals(17, utf8_strrpos($str, 'i'));
	}

	public function test_utf8_offset()
	{
		$str = 'Iñtërnâtiônàlizætiøn';
		$this->assertEquals(19, utf8_strrpos($str, 'n', 11));
	}

	public function test_utf8_invalid()
	{
		$str = "Iñtërnâtiôn\xe9àlizætiøn";
		$this->assertEquals(15, utf8_strrpos($str, 'æ'));
	}

	public function test_ascii()
	{
		$str = 'ABC ABC';
		$this->assertEquals(5, utf8_strrpos($str, 'B'));
	}

	public function test_vs_strpos()
	{
		$str = 'ABC 123 ABC';
		$this->assertEquals(strrpos($str, 'B'), utf8_strrpos($str, 'B'));
	}

	public function test_empty_str()
	{
		$str = '';
		$this->assertFalse(utf8_strrpos($str, 'x'));
	}

	public function test_linefeed()
	{
		$str = "Iñtërnâtiônàlizætiø\nn";
		$this->assertEquals(17, utf8_strrpos($str, 'i'));
	}

	public function test_linefeed_search()
	{
		$str = "Iñtërnâtiônàlizætiø\nn";
		$this->assertEquals(19, utf8_strrpos($str, "\n"));
	}
}
