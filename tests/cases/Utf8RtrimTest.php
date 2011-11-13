<?php

require_once dirname(__FILE__).'/../bootstrap.php';
require_once UTF8.'/functions/trim.php';


class Utf8RtrimTest extends PHPUnit_Framework_TestCase
{
	public function test_trim()
	{
		$str = 'Iñtërnâtiônàlizætiø';
		$trimmed = 'Iñtërnâtiônàlizæti';
		$this->assertEquals($trimmed, utf8_rtrim($str, 'ø'));
	}

	public function test_no_trim()
	{
		$str = 'Iñtërnâtiônàlizætiøn ';
		$trimmed = 'Iñtërnâtiônàlizætiøn ';
		$this->assertEquals($trimmed, utf8_rtrim($str, 'ø'));
	}

	public function test_empty_string()
	{
		$str = '';
		$trimmed = '';
		$this->assertEquals($trimmed, utf8_rtrim($str));
	}

	public function test_linefeed()
	{
		$str = "Iñtërnâtiônàlizætiø\nø";
		$trimmed = "Iñtërnâtiônàlizætiø\n";
		$this->assertEquals($trimmed, utf8_rtrim($str, 'ø'));
	}

	public function test_linefeed_mask()
	{
		$str = "Iñtërnâtiônàlizætiø\nø";
		$trimmed = "Iñtërnâtiônàlizæti";
		$this->assertEquals($trimmed, utf8_rtrim($str, "ø\n"));
	}
}
