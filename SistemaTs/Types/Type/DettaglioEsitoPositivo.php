<?php

namespace SistemaTs\Types\Type;

class DettaglioEsitoPositivo
{

    /**
     * @var string
     */
    private $pdf = null;

    /**
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * @param string $pdf
     * @return DettaglioEsitoPositivo
     */
    public function withPdf($pdf)
    {
        $new = clone $this;
        $new->pdf = $pdf;

        return $new;
    }


}

