<?php

namespace SistemaTs\Types\Type;

class DatiOutput
{

    /**
     * @var string
     */
    private $esitoChiamata = null;

    /**
     * @var \SistemaTs\Types\Type\EsitiPositivi
     */
    private $esitiPositivi = null;

    /**
     * @var \SistemaTs\Types\Type\EsitiNegativi
     */
    private $esitiNegativi = null;

    /**
     * @return string
     */
    public function getEsitoChiamata()
    {
        return $this->esitoChiamata;
    }

    /**
     * @param string $esitoChiamata
     * @return DatiOutput
     */
    public function withEsitoChiamata($esitoChiamata)
    {
        $new = clone $this;
        $new->esitoChiamata = $esitoChiamata;

        return $new;
    }

    /**
     * @return \SistemaTs\Types\Type\EsitiPositivi
     */
    public function getEsitiPositivi()
    {
        return $this->esitiPositivi;
    }

    /**
     * @param \SistemaTs\Types\Type\EsitiPositivi $esitiPositivi
     * @return DatiOutput
     */
    public function withEsitiPositivi($esitiPositivi)
    {
        $new = clone $this;
        $new->esitiPositivi = $esitiPositivi;

        return $new;
    }

    /**
     * @return \SistemaTs\Types\Type\EsitiNegativi
     */
    public function getEsitiNegativi()
    {
        return $this->esitiNegativi;
    }

    /**
     * @param \SistemaTs\Types\Type\EsitiNegativi $esitiNegativi
     * @return DatiOutput
     */
    public function withEsitiNegativi($esitiNegativi)
    {
        $new = clone $this;
        $new->esitiNegativi = $esitiNegativi;

        return $new;
    }


}

