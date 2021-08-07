<?php

namespace SistemaTs\Types\Type;

class EsitiNegativi
{

    /**
     * @var \SistemaTs\Types\Type\DettaglioEsitoNegativo
     */
    private $dettaglioEsitoNegativo = null;

    /**
     * @return \SistemaTs\Types\Type\DettaglioEsitoNegativo
     */
    public function getDettaglioEsitoNegativo()
    {
        return $this->dettaglioEsitoNegativo;
    }

    /**
     * @param \SistemaTs\Types\Type\DettaglioEsitoNegativo $dettaglioEsitoNegativo
     * @return EsitiNegativi
     */
    public function withDettaglioEsitoNegativo($dettaglioEsitoNegativo)
    {
        $new = clone $this;
        $new->dettaglioEsitoNegativo = $dettaglioEsitoNegativo;

        return $new;
    }


}

