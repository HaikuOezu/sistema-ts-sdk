<?php

namespace SistemaTs\Types\Type;

class Proprietario
{

    /**
     * @var string
     */
    private $codiceRegione = null;

    /**
     * @var string
     */
    private $codiceAsl = null;

    /**
     * @var string
     */
    private $codiceSSA = null;

    /**
     * @var string
     */
    private $cfProprietario = null;

    /**
     * @return string
     */
    public function getCodiceRegione()
    {
        return $this->codiceRegione;
    }

    /**
     * @param string $codiceRegione
     * @return Proprietario
     */
    public function withCodiceRegione($codiceRegione)
    {
        $new = clone $this;
        $new->codiceRegione = $codiceRegione;

        return $new;
    }

    /**
     * @return string
     */
    public function getCodiceAsl()
    {
        return $this->codiceAsl;
    }

    /**
     * @param string $codiceAsl
     * @return Proprietario
     */
    public function withCodiceAsl($codiceAsl)
    {
        $new = clone $this;
        $new->codiceAsl = $codiceAsl;

        return $new;
    }

    /**
     * @return string
     */
    public function getCodiceSSA()
    {
        return $this->codiceSSA;
    }

    /**
     * @param string $codiceSSA
     * @return Proprietario
     */
    public function withCodiceSSA($codiceSSA)
    {
        $new = clone $this;
        $new->codiceSSA = $codiceSSA;

        return $new;
    }

    /**
     * @return string
     */
    public function getCfProprietario()
    {
        return $this->cfProprietario;
    }

    /**
     * @param string $cfProprietario
     * @return Proprietario
     */
    public function withCfProprietario($cfProprietario)
    {
        $new = clone $this;
        $new->cfProprietario = $cfProprietario;

        return $new;
    }


}

