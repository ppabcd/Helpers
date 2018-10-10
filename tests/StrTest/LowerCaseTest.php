<?php


namespace Helpers\StrTest;


use PHPUnit\Framework\TestCase;
use Helpers\Str;

class LowerCaseTest extends TestCase
{
    /** @test */
    public function latin_letters_to_upper_case()
    {
        $this->assertEquals(Str::lower_case('HeLLo WorlD'), 'hello world');
    }

    /** @test */
    public function cyrillic_letters_to_upper_case()
    {
        $this->assertEquals(Str::lower_case('ХеЛЛо ВорлД'), 'хелло ворлд');
    }
}
