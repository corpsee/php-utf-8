<?php

require_once dirname(__FILE__).'/../bootstrap.php';
require_once UTF8.'/functions/stristr.php';


class Utf8StristrTest extends PHPUnit_Framework_TestCase
{
	public function test_substr()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$search = 'NÂT';
		$this->assertEquals('nâtiônàlizætiøn', utf8_stristr($str, $search));
	}

	public function test_substr_no_match()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$search = 'foo';
		$this->assertFalse(utf8_stristr($str, $search));
	}

	public function test_empty_search()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$search = '';
		$this->assertEquals('iñtërnâtiônàlizætiøn', utf8_stristr($str, $search));
	}

	public function test_empty_str()
	{
		$str = '';
		$search = 'NÂT';
		$this->assertFalse(utf8_stristr($str, $search));
	}

	public function test_empty_both()
	{
		$str = '';
		$search = '';
		$this->assertEmpty(utf8_stristr($str, $search));
	}

	public function test_linefeed_str()
	{
		$str = "iñt\nërnâtiônàlizætiøn";
		$search = 'NÂT';
		$this->assertEquals('nâtiônàlizætiøn', utf8_stristr($str, $search));
	}

	public function test_linefeed_both()
	{
		$str = "iñtërn\nâtiônàlizætiøn";
		$search = "N\nÂT";
		$this->assertEquals("n\nâtiônàlizætiøn", utf8_stristr($str, $search));
	}
}
