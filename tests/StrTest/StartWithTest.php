<?php
namespace Helpers\Tests\StrTest;

use Helpers\Str;
use PHPUnit\Framework\TestCase;

class StartWithTest extends TestCase
{
	public function testProvided()
	{
		$haystack = "abcdefg";
		$needle   = "abc";
		$this->assertTrue(Str::startWith($needle, $haystack));
	}

	public function testRandom()
	{
		for ($i=0; $i < 10; $i++) { 
			$haystack = Str::random(64);
			$needle   = substr($haystack, 0, rand(1, 10));
			$this->assertTrue(Str::startWith($needle, $haystack));	
		}
	}
}