<?php
namespace FilmTools\NDeviation;

interface NDeviationInterface
{

    /**
     * @return string|null
     */
    public function getType() : ?string;

    /**
     * @return float|null
     */
    public function getValue() : ?float;

    /**
     * @return bool
     */
    public function valid() : bool;
}

