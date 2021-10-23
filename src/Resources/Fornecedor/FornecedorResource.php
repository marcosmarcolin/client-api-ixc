<?php

namespace IXClientAPI\Resources\Fornecedor;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\Interfaces\ResourcesInterface;
use IXClientAPI\Resources\Resources;

class FornecedorResource extends Resources implements ResourcesInterface
{
    const CADASTRAR_FORNECEDOR = 'fornecedor';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
