<?php

namespace SistemaTs\Types\Type;


class InviaFileMtomResponse
{

    /**
     * @var \SistemaTs\Types\Type\RicevutaInvio
     */
    private $return = null;

    /**
     * @return \SistemaTs\Types\Type\RicevutaInvio
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @param \SistemaTs\Types\Type\RicevutaInvio $return
     * @return InviaFileMtomResponse
     */
    public function withReturn($return)
    {
        $new = clone $this;
        $new->return = $return;

        return $new;
    }


}

