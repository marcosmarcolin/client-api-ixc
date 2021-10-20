<?php

namespace IXClientAPI\Resources\Cliente;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\Resources\Resources;

class ClienteResource extends Resources
{
    const LISTAR_CLIENTE_POR_TELEFONE = 'cliente';
    const LISTAR_CLIENTE_POR_CPF = 'cliente';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
