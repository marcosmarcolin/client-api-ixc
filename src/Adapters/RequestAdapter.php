<?php

namespace IXClientAPI\Adapters;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RequestAdapter
{
    private array $clientConfigs;
    private array $clientOptions;
    private $response;

    /**
     * @param array $clientConfigs
     */
    public function setClientConfigs(array $clientConfigs): void
    {
        $this->clientConfigs = $clientConfigs;
    }

    /**
     * @param array $clientOptions
     */
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
        $contents = json_decode($this->response->getBody()->getContents(), true);
        $response = json_encode(
            [
                'code' => $this->response->getStatusCode(),
                'contents' => $contents
            ]
        );
        return $returnArray === true ? json_decode($response, true) : $response;
    }
}
