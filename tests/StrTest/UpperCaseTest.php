<?php


namespace Helpers\StrTest;


use Helpers\Str;
use PHPUnit\Framework\TestCase;

class UpperCaseTest extends TestCase
{
    /** @test */
    public function latin_letters_to_upper_case()
    {
        $this->assertEquals(Str::upper_case('HeLLo WorlD'), 'HELLO WORLD');
    }

    /** @test */
    public function cyrillic_letters_to_upper_case()
    {
        $this->assertEquals(Str::upper_case('ХеЛЛо ВорлД'), 'ХЕЛЛО ВОРЛД');
    }
}