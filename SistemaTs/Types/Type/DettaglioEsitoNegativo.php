<?php

namespace SistemaTs\Types\Type;

class DettaglioEsitoNegativo
{

    /**
     * @var string
     */
    private $codice = null;

    /**
     * @var string
     */
    private $descrizione = null;

    /**
     * @return string
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * @param string $codice
     * @return DettaglioEsitoNegativo
     */
    public function withCodice($codice)
    {
        $new = clone $this;
        $new->codice = $codice;

        return $new;
    }

    /**
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @param string $descrizione
     * @return DettaglioEsitoNegativo
     */
    public function withDescrizione($descrizione)
    {
        $new = clone $this;
        $new->descrizione = $descrizione;

        return $new;
    }


}

