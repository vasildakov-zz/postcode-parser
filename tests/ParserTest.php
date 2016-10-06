<?php

namespace VasilDakov\Tests;

use VasilDakov\Postcode\Postcode;
use VasilDakov\Postcode\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->value    = 'AA9A 9AA';
        $this->postcode = new Postcode('AA9A 9AA');
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::outward
     */
    public function canReturnOutwardCode()
    {
        $parser = new Parser(new Postcode('AA9A 9AA'));

        self::assertEquals('AA9A', $parser->outward());
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::inward
     */
    public function canReturnInwardCode()
    {
        $parser = new Parser(new Postcode('AA9A 9AA'));

        self::assertEquals('9AA', $parser->inward());
    }
}
