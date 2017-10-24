<?php

namespace StrTest;

use Str;
use PHPUnit\Framework\TestCase;

class StripSlashesTest extends TestCase
{
	public function testString()
	{
		$this->assertTrue(Str::strip_slashes("test\\\\") === "test\\");
	}

	public function testArray()
	{
		$this->assertTrue(
			Str::strip_slashes(
				[
					"aaaaa\\\\",
					"bbbbb\\\\",
					"ccccc\\\\"
				]
			) === 
				[
					"aaaaa\\",
					"bbbbb\\",
					"ccccc\\"
				]
		);
	}
}