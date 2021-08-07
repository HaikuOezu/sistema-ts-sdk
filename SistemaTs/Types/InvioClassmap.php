<?php

namespace SistemaTs\Types;


class InvioClassmap
{

    public static function getMap()
    {
        return [
            'ricevutaInvio' => Type\RicevutaInvio::class,
            'inviaFileMtom' => Type\InviaFileMtom::class,
            'proprietario'  => Type\Proprietario::class,
            'inviaFileMtomResponse' => Type\InviaFileMtomResponse::class,
        ];
    }


}

