<?php

require_once PHP_UTF_8_DIR . '/functions/strcspn.php';

class Utf8StrcspnTest extends PHPUnit_Framework_TestCase
{
    public function test_no_match_single_byte_search()
    {
        $str = 'iñtërnâtiônàlizætiøn';
        $this->assertEquals(2, utf8\cspn($str, 't'));
    }

    protected function tes_no_match_multi_byte_search()
    {
        $str = 'iñtërnâtiônàlizætiøn';
        $this->assertEquals(6, utf8\cspn($str, 'â'));
    }

    public function test_compare_strspn()
    {
        $str = 'aeioustr';
        $this->assertEquals(strcspn($str, 'tr'), utf8\cspn($str, 'tr'));
    }

    public function test_match_ascii()
    {
        $str = 'internationalization';
        $this->assertEquals(strcspn($str, 'a'), utf8\cspn($str, 'a'));
    }

    public function test_linefeed()
    {
        $str = "i\nñtërnâtiônàlizætiøn";
        $this->assertEquals(3, utf8\cspn($str, 't'));
    }

    public function test_linefeed_mask()
    {
        $str = "i\nñtërnâtiônàlizætiøn";
        $this->assertEquals(1, utf8\cspn($str, "\n"));
    }

    public function test_7()
    {
        $str = "abcdefghijklmnop";
        $this->assertEquals(4, utf8\cspn($str, 'h', 3));
        $this->assertEquals(0, utf8\cspn($str, 'd', 3));
    }

    public function test_8()
    {
        $str = "<b>A brief test.</b><div>";
        $this->assertEquals(3, utf8\cspn($str, '/>', 21));
        $this->assertEquals(1, utf8\cspn($str, '/>', 1));
    }

    public function test_9()
    {
        $str = "<b>A brief test.</b><div>現在、企業ユーザー向けに多岐にわたるサービスを提供しています。</div>";
        $this->assertEquals(2, utf8\cspn($str, ">")); //!
        $this->assertEquals(3, utf8\cspn($str, '\/\>', 21));
        $this->assertEquals(8, utf8\cspn($str, '向けに', 26));
    }
}
