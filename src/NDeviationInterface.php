<?php
namespace FilmTools\NDeviation;

interface NDeviationInterface
{

    /**
     * @return string|null
     */
    public function getType() : ?string;

    /**
     * @return float
     */
    public function getValue() : float;
}

