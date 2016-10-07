<?php

namespace VasilDakov\Tests;

use VasilDakov\Postcode\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string $value
     */
    private $value;

    public function setUp()
    {
        $this->value  = 'AA9A 9AA';
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::__construct
     */
    public function parserCanBeConstructedWithPostcode()
    {
        $parser = new Parser('AA9A 9AA');
        self::assertInstanceOf(Parser::class, $parser);
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::__construct
     * @expectedException \VasilDakov\Postcode\Exception\InvalidPostcodeException
     */
    public function parserThrowsAnExceptionWithImvalidPostcode()
    {
        $parser = new Parser('ABC1 XYZ2');
    }


    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::outward
     */
    public function canReturnOutwardCode()
    {
        self::assertEquals('AA9A', (new Parser('AA9A 9AA'))->outward());
    }


    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::inward
     */
    public function canReturnInwardCode()
    {
        self::assertEquals('9AA', (new Parser('AA9A 9AA'))->inward());
    }


    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::area
     */
    public function canReturnAreaCode()
    {
        self::assertEquals('AA', (new Parser('AA9A 9AA'))->area());

        self::assertEquals('A', (new Parser('A9A 9AA'))->area());
    }


    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::district
     */
    public function canReturnDistrictCode()
    {
        self::assertEquals('AA9', (new Parser('AA9A 9AA'))->district());

        self::assertEquals('A9', (new Parser('A9A 9AA'))->district());
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::subdistrict
     */
    public function canReturnSubdistrictCode()
    {
        self::assertEquals('AA9A', (new Parser('AA9A 9AA'))->subdistrict());

        self::assertEquals('A9A', (new Parser('A9A 9AA'))->subdistrict());

        self::assertEquals('', (new Parser('A9 9AA'))->subdistrict());
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::sector
     */
    public function canReturnSectorCode()
    {
        self::assertEquals('AA9A 9', (new Parser('AA9A 9AA'))->sector());

        self::assertEquals('A9A 9', (new Parser('A9A 9AA'))->sector());
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::unit
     */
    public function canReturnUnitCode()
    {
        self::assertEquals('AA', (new Parser('AA9A 9AA'))->unit());

        self::assertEquals('AA', (new Parser('A9A 9AA'))->unit());
    }

    /**
     * @test
     * @covers \VasilDakov\Postcode\Parser::parse
     */
    public function canParsePostcode()
    {
        $array = (new Parser('AA9A 9AA'))->parse();

        self::assertInternalType('array', $array);

        self::assertArrayHasKey('outward', $array);
        self::assertArrayHasKey('inward', $array);
        self::assertArrayHasKey('area', $array);
        self::assertArrayHasKey('district', $array);
        self::assertArrayHasKey('subdistrict', $array);
        self::assertArrayHasKey('sector', $array);
        self::assertArrayHasKey('unit', $array);
    }
}
