<?php

namespace IXClientAPI\Resources\Lead;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Interfaces\ResourcesInterface;
use IXClientAPI\Resources\Resources;

class LeadResource extends Resources implements ResourcesInterface
{
    const INSERIR_LEAD = 'contato';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
