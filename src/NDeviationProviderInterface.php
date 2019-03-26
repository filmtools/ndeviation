<?php
namespace FilmTools\NDeviation;

interface NDeviationProviderInterface
{
    public function getNDeviation() : NDeviationInterface;
}
