<?php

namespace SistemaTs\Types\Type;


class RicevutaPdf 
{

    /**
     * @var \SistemaTs\Types\Type\DatiInput
     */
    private $DatiInputRichiesta = null;

    /**
     * Constructor
     *
     * @var \SistemaTs\Types\Type\DatiInput $DatiInputRichiesta
     */
    public function __construct($DatiInputRichiesta)
    {
        $this->DatiInputRichiesta = $DatiInputRichiesta;
    }

    /**
     * @return \SistemaTs\Types\Type\DatiInput
     */
    public function getDatiInputRichiesta()
    {
        return $this->DatiInputRichiesta;
    }

    /**
     * @param \SistemaTs\Types\Type\DatiInput $DatiInputRichiesta
     * @return RicevutaPdf
     */
    public function withDatiInputRichiesta($DatiInputRichiesta)
    {
        $new = clone $this;
        $new->DatiInputRichiesta = $DatiInputRichiesta;

        return $new;
    }


}

