<?php

namespace StrTest;

use Str;
use PHPUnit\Framework\TestCase;

class ContainsTest extends TestCase
{
    public function testString()
    {
        $this->assertTrue(Str::contains("Today is a beautiful day.", 'beauti') === true);
        $this->assertFalse(Str::contains("Today is a beautiful day.", 'beauty') === true);
    }
}
