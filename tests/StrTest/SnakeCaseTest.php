<?php


namespace Helpers\StrTest;


use Helpers\Str;
use PHPUnit\Framework\TestCase;

class SnakeCaseTest extends TestCase
{
    /** @test */
    public function snake_case_should_be_returned_from_words()
    {
        $this->assertEquals(Str::snake_case('Hello World Ya`ll'), 'hello_world_ya`ll');
    }

    /** @test */
    public function snake_case_with_different_delimiter()
    {
        $this->assertEquals(Str::snake_case('Hello World Ya`ll', '-'), 'hello-world-ya`ll');
    }

    /** @test */
    public function generated_snake_case_should_be_cached()
    {
        Str::snake_case('Hello World');

        $this->assertEquals('hello_world', Str::$snakeCache['Hello World']['_']);
    }
}