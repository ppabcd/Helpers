<?php

namespace Helpers\Tests\StrTest;

use Helpers\Str;
use PHPUnit\Framework\TestCase;

class ArrayStartsWithTest extends TestCase
{
    public function testString()
    {
        $array = [
          'bread' => 'wheat',
          'foo' => 'bar'
        ];
        
        $processed = Str::array_keys_start_with($array, 'bread');
        $expected = ['bread' => 'wheat'];
        
        $this->assertTrue(Str::arrays_match($processed, $expected));
    }
}
