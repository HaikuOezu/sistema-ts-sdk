<?php

namespace SistemaTs\Types;


class InvioSicronoClassmap
{

    public static function getMap()
    {
        return [
            'cancellazioneDocumentoSpesaResponse' => Type\DocumentoSpesaResponse::class,
            'rimborsoDocumentoSpesaResponse' => Type\DocumentoSpesaResponse::class,
            'variazioneDocumentoSpesaResponse' => Type\DocumentoSpesaResponse::class,
            'inserimentoDocumentoSpesaResponse' => Type\DocumentoSpesaResponse::class,
            'listaMessaggi' => Type\ListaMessaggi::class,
            'messaggio' => Type\Messaggio::class,
        ];
    }

}

