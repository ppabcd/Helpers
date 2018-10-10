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
