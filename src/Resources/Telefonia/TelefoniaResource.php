<?php

namespace IXClientAPI\Resources\Telefonia;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Interfaces\ResourcesInterface;
use IXClientAPI\Resources\Resources;

class TelefoniaResource extends Resources implements ResourcesInterface
{
    const INSERIR_RAMAL_SIP = 'voip_sippeers';
    const LISTAR_REGISTROS_VOIP = 'cdr';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
