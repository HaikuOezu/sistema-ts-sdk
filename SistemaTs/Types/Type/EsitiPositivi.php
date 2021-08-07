<?php

namespace SistemaTs\Types\Type;

class EsitiPositivi
{

    /**
     * @var \SistemaTs\Types\Type\DettaglioEsitoPositivo
     */
    private $dettagliEsito = null;

    /**
     * @return \SistemaTs\Types\Type\DettaglioEsitoPositivo
     */
    public function getDettagliEsito()
    {
        return $this->dettagliEsito;
    }

    /**
     * @param \SistemaTs\Types\Type\DettaglioEsitoPositivo $dettagliEsito
     * @return EsitiPositivi
     */
    public function withDettagliEsito($dettagliEsito)
    {
        $new = clone $this;
        $new->dettagliEsito = $dettagliEsito;

        return $new;
    }


}

