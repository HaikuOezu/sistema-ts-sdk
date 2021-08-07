<?php

namespace SistemaTs\Types;


class RicevutaClassmap
{

    public static function getMap()
    {
        return [
            'dettaglioEsitoNegativo' => Type\DettaglioEsitoNegativo::class,
            'dettaglioEsitoPositivo' => Type\DettaglioEsitoPositivo::class,
            'datiOutput' => Type\DatiOutput::class,
            'esitiPositivi' => Type\EsitiPositivi::class,
            'esitiNegativi' => Type\EsitiNegativi::class,
            'datiInput'=> Type\DatiInput::class,
            'RicevutaPdfResponse' => Type\RicevutaPdfResponse::class,
            'RicevutaPdf' => Type\RicevutaPdf::class,
        ];
    }


}

