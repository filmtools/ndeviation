<?php
namespace tests;

use FilmTools\NDeviation\NDeviation;
use FilmTools\NDeviation\NDeviationInterface;
use FilmTools\NDeviation\NDeviationProviderInterface;

class NDeviationTest extends \PHPUnit\Framework\TestCase
{

    public function testInterfaces() : void
    {
        $sut = new NDeviation( 0.99, "title");

        $this->assertInstanceOf(NDeviationInterface::class, $sut);
        $this->assertInstanceOf(NDeviationProviderInterface::class, $sut);

        $this->assertInstanceOf(NDeviationInterface::class, $sut->getNDeviation());

    }

    /**
     * @dataProvider provideCtorArguments
     * @param mixed $N
     * @param mixed $type
     */
    public function testInstantiation( $N, $type) : void
    {
        $sut = new NDeviation( $N, $type);

        $this->assertEquals($N, $sut->getValue());
        $this->assertEquals($type, $sut->getType());
    }


    /**
     * @return mixed[]
     */
    public function provideCtorArguments() : array
    {
        return array(
            [  null, "title" ],
            [  1, "title" ],
            [  2.2, null],
            [  -3, "title"],

        );
    }

    public function isValidGetter() : void
    {
        $sut = new NDeviation( null );
        $this->assertFalse( $sut->valid());

        $sut = new NDeviation( 0.99 );
        $this->assertTrue( $sut->valid());

    }

}
