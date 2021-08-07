<?php

namespace SistemaTs\Types\Type;

class DatiInput
{

    /**
     * @var string
     */
    private $pinCode = null;

    /**
     * @var string
     */
    private $protocollo = null;

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
     * @return string
     */
    public function getPinCode()
    {
        return $this->pinCode;
    }

    /**
     * @param string $pinCode
     * @return DatiInput
     */
    public function withPinCode($pinCode)
    {
        $new = clone $this;
        $new->pinCode = $pinCode;

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
     * @return DatiInput
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
    public function getOpzionale1()
    {
        return $this->opzionale1;
    }

    /**
     * @param string $opzionale1
     * @return DatiInput
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
     * @return DatiInput
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
     * @return DatiInput
     */
    public function withOpzionale3($opzionale3)
    {
        $new = clone $this;
        $new->opzionale3 = $opzionale3;

        return $new;
    }


}

