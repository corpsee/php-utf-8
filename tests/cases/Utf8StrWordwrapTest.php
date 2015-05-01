<?php

require_once PHP_UTF_8_DIR . '/functions/wordwrap.php';

class Utf8StrWordwrapTest extends PHPUnit_Framework_TestCase
{
    public function test_no_args()
    {
        $str = 'Iñtërnâtiônàlizætiøn';
        $wrapped = 'Iñtërnâtiônàlizætiøn';
        $this->assertEquals($wrapped, utf8\wordwrap($str));
    }

    public function test_break_at_ten()
    {
        $str = 'Iñtërnâtiônàlizætiøn Iñtërnâtiônàlizætiøn';
        $wrapped = "Iñtërnâtiônàlizætiøn\nIñtërnâtiônàlizætiøn";
        $this->assertEquals($wrapped, utf8\wordwrap($str, 10));
    }

    public function test_break_at_ten_cut()
    {
        $str = 'Iñtërnâtiônàlizætiøn';
        $wrapped = "Iñtërnâtiô\nnàlizætiøn";
        $this->assertEquals($wrapped, utf8\wordwrap($str, 10, "\n", true));
    }

    public function test_break_at_ten_br()
    {
        $str = 'Iñtërnâtiônàlizætiøn Iñtërnâtiônàlizætiøn';
        $wrapped = "Iñtërnâtiônàlizætiøn<br />Iñtërnâtiônàlizætiøn";
        $this->assertEquals($wrapped, utf8\wordwrap($str, 12, '<br />'));
    }

    public function test_break_at_ten_int()
    {
        $str = 'Iñtërnâtiônàlizætiøn';
        $wrapped = "Iñtërnâtiônà<br />lizætiøn";
        $this->assertEquals($wrapped, utf8\wordwrap($str, 12, '<br />', true));
    }
}

