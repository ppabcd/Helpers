<?php

namespace StrTest;

use Helpers\Str;
use PHPUnit\Framework\TestCase;

class CamelizeTest extends TestCase
{
    public function testString()
    {
        $this->assertTrue(Str::camelize("hello_world") === "HelloWorld");
        $this->assertTrue(Str::camelize("i_am_an_example_string") === "IAmAnExampleString");

        $this->assertTrue(Str::camelize("hello-world") === "HelloWorld");
        $this->assertTrue(Str::camelize("i-am-an-example-string") === "IAmAnExampleString");
    }
}
