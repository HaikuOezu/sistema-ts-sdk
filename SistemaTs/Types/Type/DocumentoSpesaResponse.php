<?php

namespace SistemaTs\Types\Type;

class Messaggio {
    /**
     * @var string
     */
    public $codice;

    /**
     * @var string
     */
    public $descrizione;

    /**
     * @var string
     */
    public $tipo;
}

class ListaMessaggi {
    /**
     * @var SistemaTs\Types\Type\Messaggio[]
     */
    public $messaggio = null;
}

class DocumentoSpesaResponse
{
    /**
     * @var string
     */
    public $esitoChiamata = null;

    /**
     * @var string
     */
    public $protocollo = null;

    /**
     * @var SistemaTs\Types\Type\ListaMessaggi
     */
    public $listaMessaggi = null;
}

