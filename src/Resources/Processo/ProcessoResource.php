<?php

namespace IXClientAPI\Resources\Processo;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Interfaces\ResourcesInterface;
use IXClientAPI\Resources\Resources;

class ProcessoResource extends Resources implements ResourcesInterface
{
    const INSERIR_TAREFA_EM_PROCESSO = 'wfl_tarefa';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
