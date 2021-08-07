<?php

namespace SistemaTs\Types\Type;

class RicevutaPdfResponse 
{

    /**
     * @var \SistemaTs\Types\Type\DatiOutput
     */
    private $DatiOutputRichiesta = null;

    /**
     * @return \SistemaTs\Types\Type\DatiOutput
     */
    public function getDatiOutputRichiesta()
    {
        return $this->DatiOutputRichiesta;
    }

    /**
     * @param \SistemaTs\Types\Type\DatiOutput $DatiOutputRichiesta
     * @return RicevutaPdfResponse
     */
    public function withDatiOutputRichiesta($DatiOutputRichiesta)
    {
        $new = clone $this;
        $new->DatiOutputRichiesta = $DatiOutputRichiesta;

        return $new;
    }


}

