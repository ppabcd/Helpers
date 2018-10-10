<?php

namespace Helpers\Tests\StrTest;

use Helpers\Str;
use PHPUnit\Framework\TestCase;

class ArrayEndsWithTest extends TestCase
{
    public function testString()
    {
        $array = [
          'bread' => 'wheat',
          'foo' => 'bar'
        ];
        
        $processed = Str::array_keys_end_with($array, 'foo');
        $expected = ['foo' => 'bar'];
        
        $this->assertTrue(Str::arrays_match($processed, $expected));
    }
}
