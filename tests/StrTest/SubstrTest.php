<?php
namespace Helpers\Tests\StrTest;

use Helpers\Str;
use PHPUnit\Framework\TestCase;

class SubstrTest extends TestCase
{
    public function testString()
    {
        $this->assertEquals('DEFGH', Str::substr('ABCDEFGH', 3));
        $this->assertEquals('こん', Str::substr('こんにちは世界', 0,2));
    }
}
