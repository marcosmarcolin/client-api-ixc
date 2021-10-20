<?php

namespace IXClientAPI\Resources\Lead;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Resources\Resources;

class LeadResource extends Resources
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
