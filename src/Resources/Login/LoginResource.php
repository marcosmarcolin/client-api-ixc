<?php

namespace IXClientAPI\Resources\Login;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Interfaces\ResourcesInterface;
use IXClientAPI\Resources\Resources;

class LoginResource extends Resources implements ResourcesInterface
{
    const LIMPAR_MAC = 'radusuarios_25452';
    const DESCONECTAR_LOGIN = 'desconectar_clientes';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
