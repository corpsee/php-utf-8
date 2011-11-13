<?php

require_once dirname(__FILE__).'/../bootstrap.php';
require_once UTF8.'/functions/trim.php';


class Utf8TrimTest extends PHPUnit_Framework_TestCase
{
	public function test_trim()
	{
		$str = 'ñtërnâtiônàlizætiø';
		$trimmed = 'tërnâtiônàlizæti';
		$this->assertEquals($trimmed, utf8_trim($str, 'ñø'));
	}

	public function test_no_trim()
	{
		$str = ' Iñtërnâtiônàlizætiøn ';
		$trimmed = ' Iñtërnâtiônàlizætiøn ';
		$this->assertEquals($trimmed, utf8_trim($str, 'ñø'));
	}

	public function test_empty_string()
	{
		$str = '';
		$trimmed = '';
		$this->assertEquals($trimmed, utf8_trim($str));
	}
}
