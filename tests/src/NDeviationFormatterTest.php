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

}
