<?php
namespace FilmTools\NDeviation;

/**
 * Defines a set of Twig Filters for formatting certain numbers in Twig templates
 */
class TwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_Filter('ndeviation', new NDeviationFormatter),
        );
    }
}
