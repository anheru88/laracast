<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    #[Test, DataProvider('tagsProvider')]
    public function it_parses_tag($input, $expected)
    {
        $parser = new TagParser;
        $result = $parser->parse($input);

        $this->assertSame($expected, $result);

    }

    public static function tagsProvider() {
        return [
            ['personal', ['personal']],
            ['personal, money, family', ['personal', 'money', 'family']],
            ['personal | money | family', ['personal', 'money', 'family']],
            ['personal,money,family', ['personal', 'money', 'family']],
            ['personal|money|family', ['personal', 'money', 'family']],
            ['personal!money!family', ['personal', 'money', 'family']]


        ];
    }

}