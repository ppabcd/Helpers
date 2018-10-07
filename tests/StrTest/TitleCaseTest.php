<?php

namespace StrTest;

use Str;
use PHPUnit\Framework\TestCase;

class TitleCaseTest extends TestCase
{
    public function testString()
    {
        $this->assertTrue(Str::title_case("hello world") === "Hello World");
    }

    public function testArray()
    {
        $this->assertTrue(
            Str::title_case(
                [
                    "hello from superman",
                    "hi from batman!!",
                    "namaste 2 times from ironMan"
                ]
            ) ===
            [
                "Hello From Superman",
                "Hi From Batman!!",
                "Namaste 2 Times From Ironman"
            ]
        );
    }
}
