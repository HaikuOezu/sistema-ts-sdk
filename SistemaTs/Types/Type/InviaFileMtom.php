<?php

namespace SistemaTs\Types\Type;

class InviaFileMtom 
{

    /**
     * @var string
     */
    private $nomeFileAllegato = null;

    /**
     * @var string
     */
    private $pincodeInvianteCifrato = null;

    /**
     * @var \SistemaTs\Types\Type\Proprietario
     */
    private $datiProprietario = null;

    /**
     * @var string
     */
    private $opzionale1 = null;

    /**
     * @var string
     */
    private $opzionale2 = null;

    /**
     * @var string
     */
    private $opzionale3 = null;

    /**
     * @var string
     */
    private $documento = null;

    /**
     * Constructor
     *
     * @var string $nomeFileAllegato
     * @var string $pincodeInvianteCifrato
     * @var \SistemaTs\Types\Type\Proprietario $datiProprietario
     * @var string $opzionale1
     * @var string $opzionale2
     * @var string $opzionale3
     * @var string $documento
     */
    public function __construct($nomeFileAllegato, $pincodeInvianteCifrato, $datiProprietario, $opzionale1, $opzionale2, $opzionale3, $documento)
    {
        $this->nomeFileAllegato = $nomeFileAllegato;
        $this->pincodeInvianteCifrato = $pincodeInvianteCifrato;
        $this->datiProprietario = $datiProprietario;
        $this->opzionale1 = $opzionale1;
        $this->opzionale2 = $opzionale2;
        $this->opzionale3 = $opzionale3;
        $this->documento = $documento;
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
     * @return InviaFileMtom
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
    public function getPincodeInvianteCifrato()
    {
        return $this->pincodeInvianteCifrato;
    }

    /**
     * @param string $pincodeInvianteCifrato
     * @return InviaFileMtom
     */
    public function withPincodeInvianteCifrato($pincodeInvianteCifrato)
    {
        $new = clone $this;
        $new->pincodeInvianteCifrato = $pincodeInvianteCifrato;

        return $new;
    }

    /**
     * @return \SistemaTs\Types\Type\Proprietario
     */
    public function getDatiProprietario()
    {
        return $this->datiProprietario;
    }

    /**
     * @param \SistemaTs\Types\Type\Proprietario $datiProprietario
     * @return InviaFileMtom
     */
    public function withDatiProprietario($datiProprietario)
    {
        $new = clone $this;
        $new->datiProprietario = $datiProprietario;

        return $new;
    }

    /**
     * @return string
     */
    public function getOpzionale1()
    {
        return $this->opzionale1;
    }

    /**
     * @param string $opzionale1
     * @return InviaFileMtom
     */
    public function withOpzionale1($opzionale1)
    {
        $new = clone $this;
        $new->opzionale1 = $opzionale1;

        return $new;
    }

    /**
     * @return string
     */
    public function getOpzionale2()
    {
        return $this->opzionale2;
    }

    /**
     * @param string $opzionale2
     * @return InviaFileMtom
     */
    public function withOpzionale2($opzionale2)
    {
        $new = clone $this;
        $new->opzionale2 = $opzionale2;

        return $new;
    }

    /**
     * @return string
     */
    public function getOpzionale3()
    {
        return $this->opzionale3;
    }

    /**
     * @param string $opzionale3
     * @return InviaFileMtom
     */
    public function withOpzionale3($opzionale3)
    {
        $new = clone $this;
        $new->opzionale3 = $opzionale3;

        return $new;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     * @return InviaFileMtom
     */
    public function withDocumento($documento)
    {
        $new = clone $this;
        $new->documento = $documento;

        return $new;
    }


}

