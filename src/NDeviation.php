<?php
namespace FilmTools\NDeviation;

class NDeviation implements NDeviationInterface, NDeviationProviderInterface
{

    /**
     * @var float|null
     */
    public $ndeviation;

    /**
     * @var string|null
     */
    public $type;


    /**
     * @param float       $ndeviation  Zone system N deviation value
     * @param string|null $type        Optional: Short description
     */
    public function __construct( ?float $ndeviation, string $type = null)
    {
        $this->ndeviation = $ndeviation;
        $this->type = $type;
    }

    /**
     * @return  mixed[]
     */
    public function __debugInfo() : array
    {
        return [
            'type'  => $this->getType(),
            'value' => $this->getValue()
        ];
    }

    /**
     * @inheritDoc
     */
    public function getType() : ?string
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function getValue() : ?float
    {
        return $this->ndeviation;
    }

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return !is_null( $this->ndeviation );
    }

    /**
     * @inheritDoc
     */
    public function getNDeviation() : NDeviationInterface
    {
        return $this;
    }
}
