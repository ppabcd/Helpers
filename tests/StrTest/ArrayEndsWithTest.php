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
        
        $this->assertTrue($this->arrays_match($processed, $expected));
    }
    
    protected function arrays_match($array1, $array2)
    {
        if (count(array_diff_assoc($array1, $array2))) {
            return false;
        }
        
        foreach($array1 as $k => $v) {
            if ($v !== $array2[$k]) {
                return false;
            }
        }

        return true;
    }
}
