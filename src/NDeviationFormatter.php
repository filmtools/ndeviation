<?php
namespace FilmTools\NDeviation;

class NDeviationFormatter
{

    /**
     * @var string
     */
    public $format;

    /**
     * @param string $format Optional: sprintf format string
     */
    public function __construct( string $format = "%01.1f" )
    {
        $this->format = $format;
    }

    /**
     * @param  float|NDeviationProviderInterface|NDeviationInterface $N
     * @return string
     */
    public function __invoke( $N )
    {
        if ($N instanceOf NDeviationProviderInterface):
            $N = $N->getNDeviation();
        endif;

        if ($N instanceOf NDeviationInterface):
            $N = $N->getValue();
        endif;

        if (is_string( $N )):
            if (filter_var($N, FILTER_VALIDATE_FLOAT) === false):
                return $N;
            endif;
        elseif (is_null($N)):
            return '';
        elseif (!is_numeric( $N )):
            throw new \InvalidArgumentException("Numeric value, NDeviationInterface, or NDeviationProviderInterface expected.");
        endif;


        $N_str = sprintf( $this->format, abs($N));

        if ($N > 0) {
            $N_str = "𝑵 +" . $N_str;
        } elseif ($N < 0) {
            $N_str = "𝑵 -" . $N_str;
        } else { // == 0.0
            // $N_str = "𝑵";
            $N_str = "𝑵 ±" . $N_str;
        }

        return $N_str;
    }
}
