<?php

namespace SistemaTs\Types\Type;

class RicevutaInvio
{

    /**
     * @var string
     */
    private $codiceEsito = null;

    /**
     * @var string
     */
    private $dataAccoglienza = null;

    /**
     * @var string
     */
    private $descrizioneEsito = null;

    /**
     * @var string
     */
    private $dimensioneFileAllegato = null;

    /**
     * @var string
     */
    private $nomeFileAllegato = null;

    /**
     * @var string
     */
    private $protocollo = null;

    /**
     * @var string
     */
    private $idErrore = null;

    /**
     * @return string
     */
    public function getCodiceEsito()
    {
        return $this->codiceEsito;
    }

    /**
     * @param string $codiceEsito
     * @return RicevutaInvio
     */
    public function withCodiceEsito($codiceEsito)
    {
        $new = clone $this;
        $new->codiceEsito = $codiceEsito;

        return $new;
    }

    /**
     * @return string
     */
    public function getDataAccoglienza()
    {
        return $this->dataAccoglienza;
    }

    /**
     * @param string $dataAccoglienza
     * @return RicevutaInvio
     */
    public function withDataAccoglienza($dataAccoglienza)
    {
        $new = clone $this;
        $new->dataAccoglienza = $dataAccoglienza;

        return $new;
    }

    /**
     * @return string
     */
    public function getDescrizioneEsito()
    {
        return $this->descrizioneEsito;
    }

    /**
     * @param string $descrizioneEsito
     * @return RicevutaInvio
     */
    public function withDescrizioneEsito($descrizioneEsito)
    {
        $new = clone $this;
        $new->descrizioneEsito = $descrizioneEsito;

        return $new;
    }

    /**
     * @return string
     */
    public function getDimensioneFileAllegato()
    {
        return $this->dimensioneFileAllegato;
    }

    /**
     * @param string $dimensioneFileAllegato
     * @return RicevutaInvio
     */
    public function withDimensioneFileAllegato($dimensioneFileAllegato)
    {
        $new = clone $this;
        $new->dimensioneFileAllegato = $dimensioneFileAllegato;

        return $new;
    }

    /**
     * @return string
     */
    public function getNomeFileAllegato()
    {
        return $this->nomeFileAllegato;
    }

    /**
     * @param string $nomeFileAllegato
     * @return RicevutaInvio
     */
    public function withNomeFileAllegato($nomeFileAllegato)
    {
        $new = clone $this;
        $new->nomeFileAllegato = $nomeFileAllegato;

        return $new;
    }

    /**
     * @return string
     */
    public function getProtocollo()
    {
        return $this->protocollo;
    }

    /**
     * @param string $protocollo
     * @return RicevutaInvio
     */
    public function withProtocollo($protocollo)
    {
        $new = clone $this;
        $new->protocollo = $protocollo;

        return $new;
    }

    /**
     * @return string
     */
    public function getIdErrore()
    {
        return $this->idErrore;
    }

    /**
     * @param string $idErrore
     * @return RicevutaInvio
     */
    public function withIdErrore($idErrore)
    {
        $new = clone $this;
        $new->idErrore = $idErrore;

        return $new;
    }


}

