<?php

namespace IXClientAPI\Adapters;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RequestAdapter
{
    private array $clientConfigs;
    private array $clientOptions;
    private string $clientUrl;
    private mixed $response;

    public function setClientConfigs(array $clientConfigs): void
    {
        $this->clientConfigs = $clientConfigs;
    }

    public function setClientOptions(array $clientOptions): void
    {
        $this->clientOptions = $clientOptions;
    }

    /**
     * @throws GuzzleException
     */
    public function exec($url, $method = 'POST', $returnArray = false)
    {
        $client = new Client($this->clientConfigs);
        $this->response = $client->request($method, $url, $this->clientOptions);
        return $this->getResponse($returnArray);
    }

    private function getResponse($returnArray)
    {
        $response = $this->response->getBody()->getContents();
        return $returnArray === true ? json_decode($response, true) : $response;
    }
}