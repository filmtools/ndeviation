<?php
namespace tests;

use FilmTools\NDeviation\NDeviationInterface;
use FilmTools\NDeviation\NDeviationFormatter;

class NDeviationFormatterTest extends \PHPUnit\Framework\TestCase
{


    /**
     * @dataProvider provideValidCtorArguments
     */
    public function testInstantiation( $N)
    {

        $sut = new NDeviationFormatter;
        $ndev = $this->prophesize( NDeviationInterface::class );
        $ndev->getValue()->willReturn( $N);
        $ndev_stub = $ndev->reveal();

        $result = $sut( $ndev->reveal() );
        $this->assertInternalType( "string", $result );

    }

    public function provideValidCtorArguments()
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
     */
    public function testInvokationOnString( $N, $expected_result)
    {
        $sut = new NDeviationFormatter;

        $result = $sut( $N );
        $this->assertInternalType( "string", $result );
        $this->assertEquals( $expected_result,  $result);
    }


    public function provideStringArguments()
    {
        return array(
            [  null, "" ],
            [  "-3", "𝑵 -3.0" ],
            [  "2.2", "𝑵 +2.2" ],
            [  "Some text", "Some text" ],
        );
    }

}
