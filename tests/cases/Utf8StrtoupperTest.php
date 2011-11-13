<?php

require_once dirname(__FILE__).'/../bootstrap.php';

class Utf8StrtoupperTest extends PHPUnit_Framework_TestCase
{
	public function test_upper()
	{
		$str = 'iñtërnâtiônàlizætiøn';
		$upper = 'IÑTËRNÂTIÔNÀLIZÆTIØN';
		$this->assertEquals($upper, utf8_strtoupper($str));
	}

	public function test_empty_string()
	{
		$str = '';
		$upper = '';
		$this->assertEquals($upper, utf8_strtoupper($str));
	}
}
