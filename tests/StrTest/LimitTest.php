<?php

namespace StrTest;

use Str;
use PHPUnit\Framework\TestCase;

class LimitTest extends TestCase
{
    public function testString()
    {
        $this->assertTrue(Str::limit("Today is a beautiful day.", 8) === "Today is");
    }

    public function testArray()
    {
        $this->assertTrue(
            Str::limit(
                [
                    "Winter is coming.",
                    "abrakadabra",
                    "Open source all the way."
                ],
                3
            ) ===
            [
                "Win",
                "abr",
                "Ope"
            ]
        );
    }
}
