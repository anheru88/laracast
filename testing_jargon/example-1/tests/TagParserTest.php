<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    #[Test]
    public function it_parses_a_single_tag()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal');
        $expected = ['personal'];

        $this->assertSame($expected, $result);
    }

    #[Test]
    public function it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }



    #[Test]
    public function it_parses_a_pipe_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal | money | family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

    #[Test]
    public function it_spaces_are_optional()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal,money,family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);

        $result = $parser->parse('personal|money|family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

}