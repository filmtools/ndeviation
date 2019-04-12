<?php
namespace tests;

use FilmTools\NDeviation\NDeviationInterface;
use FilmTools\NDeviation\NDeviationFormatter;

class NDeviationFormatterTest extends \PHPUnit\Framework\TestCase
{


    /**
     * @dataProvider provideCtorArguments
     */
    public function testInstantiation( $N)
    {

        $sut = new NDeviationFormatter;
        $ndev = $this->prophesize( NDeviationInterface::class );
        $ndev->getValue()->willReturn( $N);
        $ndev_stub = $ndev->reveal();

        $result = $sut( $ndev->reveal() );
        $this->assertFalse( empty( $result ));
        $this->assertInternalType( "string", $result );

    }


    public function provideCtorArguments()
    {
        return array(
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
        $this->assertFalse( empty( $result ));
        $this->assertInternalType( "string", $result );
        $this->assertEquals( $expected_result,  $result);
    }


    public function provideStringArguments()
    {
        return array(
            [  "-3", "𝑵 -3.0" ],
            [  "2.2", "𝑵 +2.2" ],
            [  "Some text", "Some text" ],
        );
    }

}
