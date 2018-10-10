<?php

namespace Helpers\Tests\StrTest;

use Helpers\Str;
use PHPUnit\Framework\TestCase;

class ArraysMatchTest extends TestCase
{
    public function testString()
    {
        $array = [
            'foo' => 'bar'
        ];

        $match = Str::arrays_match($array, $array);

        $this->assertTrue($match);
    }
}
