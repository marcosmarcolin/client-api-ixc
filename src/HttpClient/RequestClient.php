<?php

namespace IXClientAPI\HttpClient;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Adapters\RequestAdapter;
use IXClientAPI\Client;

class RequestClient
{
    private array $configs;
    private array $options;
    private object $Client;
    private string $url;

    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';

    private const WS = DIRECTORY_SEPARATOR . 'webservice' . DIRECTORY_SEPARATOR . 'v1' . DIRECTORY_SEPARATOR;

    /**
     * @return object
     */
    public function getClient(): object
    {
        return $this->Client;
    }

    /**
     * @param object $Client
     */
    public function setClient(object $Client): void
    {
        $this->Client = $Client;
    }

    public function setData()
    {
        $this->setConfigs();
        $this->setOptions();
    }

    /**
     * @throws GuzzleException
     */
    public function request()
    {
        $RequestAdapter = new RequestAdapter();
        $RequestAdapter->setClientConfigs($this->configs);
        $RequestAdapter->setClientOptions($this->options);
        return $RequestAdapter->exec(
            $this->url,
            $this->getClient()->getMethod(),
            $this->getClient()->isResponseArray()
        );
    }

    private function setConfigs()
    {
        $this->configs = [
            'timeout' => 60,
            'verify' => ! $this->getClient()->isSelfSigned()
        ];
    }

    private function setOptions()
    {
        $this->setUrl();
        $this->setAuthInOptions();
        $this->setHeaderInOptions();
        $this->setPostFields();
    }

    private function setUrl()
    {
        $url = $this->getClient()->getUrl() . self::WS . $this->getClient()->getRoute();
        if (is_numeric($this->getClient()->getRegister()) && $this->getClient()->getRegister() > 0) {
            $url .= DIRECTORY_SEPARATOR . $this->getClient()->getRegister();
        }
        $this->url = filter_var($url, FILTER_VALIDATE_URL);
    }

    private function setAuthInOptions()
    {
        $auth = explode(':', $this->getClient()->getToken());
        if (is_array($auth)) {
            $this->options['auth'] = [
                $auth[0], $auth[1]
            ];
        }
    }

    private function setHeaderInOptions()
    {
        $this->options['headers']['Content-Type'] = 'application/json';
        if ($this->getClient()->isList() === true) {
            $this->options['headers']['ixcsoft'] = 'listar';
        }
    }

    private function setPostFields()
    {
        $postFields = $this->getClient()->getParams();
        if (is_array($postFields) && count($postFields) > 0) {
            $this->options['body'] = json_encode($postFields);
        }
    }
}
