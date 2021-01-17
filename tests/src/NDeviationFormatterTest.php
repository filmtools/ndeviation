<?php
namespace tests;

use FilmTools\NDeviation\NDeviationInterface;
use FilmTools\NDeviation\NDeviationFormatter;
use Prophecy\PhpUnit\ProphecyTrait;

class NDeviationFormatterTest extends \PHPUnit\Framework\TestCase
{

    use ProphecyTrait;

    /**
     * @dataProvider provideValidCtorArguments
     * @param  ?float $N
     */
    public function testInstantiation( $N) : void
    {

        $sut = new NDeviationFormatter;
        $ndev = $this->prophesize( NDeviationInterface::class );
        $ndev->getValue()->willReturn( $N);
        $ndev_stub = $ndev->reveal();

        $result = $sut( $ndev->reveal() );
        $this->assertIsString( $result );
    }


    /**
     * @return mixed[]
     */
    public function provideValidCtorArguments() : array
    {
        return array(
            [  null ],
            [  1 ],
            [  2.2 ],
            [  0 ],
            [  -3 ],
        );
    }



    /**
     * @dataProvider provideStringArguments
     * @param  mixed $N
     */
    public function testInvokationOnString( $N, string $expected_result) : void
    {
        $sut = new NDeviationFormatter;

        $result = $sut( $N );
        $this->assertIsString( $result );
        $this->assertEquals( $expected_result,  $result);
    }


    /**
     * @return mixed[]
     */
    public function provideStringArguments() : array
    {
        return array(
            [  null, "" ],
            [  "-3", "𝑵 -3.0" ],
            [  "2.2", "𝑵 +2.2" ],
            [  "Some text", "Some text" ],
        );
    }

}
