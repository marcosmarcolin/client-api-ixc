<?php

namespace IXClientAPI\HttpClient;

use IXClientAPI\Client;

class CurlRequest
{
    private object $curl;
    private array $options;
    private object $Client;
    private mixed $response;
    private mixed $curlError;

    const IXC_LISTAR = "ixcsoft: listar";
    const CONTENT_TYPE = "Content-Type: application/json";

    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';

    private const WS = DIRECTORY_SEPARATOR . 'webservice' . DIRECTORY_SEPARATOR . 'v1' . DIRECTORY_SEPARATOR;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function getOptions(): array
    {
        return $this->options;
    }

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

    private function setOptions()
    {
        $this->setDefaultOptions();
        $this->setUrl();
        $this->setCustomRequest();
        $this->setPostFields();
        $this->setSelfAssigned();
        $this->setHttpHeaders();
    }

    private function setDefaultOptions()
    {
        $this->options[CURLOPT_RETURNTRANSFER] = true;
        $this->options[CURLOPT_TIMEOUT] = 60;
    }

    private function setHttpHeaders()
    {
        $this->options[CURLOPT_HTTPHEADER] = [
            "Authorization: Basic " . base64_encode($this->getClient()->getToken()),
            self::CONTENT_TYPE,
        ];
        if ($this->getClient()->isList() === true) {
            $this->options[CURLOPT_HTTPHEADER][] = self::IXC_LISTAR;
        }
    }

    private function setSelfAssigned()
    {
        if ($this->getClient()->isSelfSigned() === true) {
            $this->options[CURLOPT_SSL_VERIFYPEER] = false;
            $this->options[CURLOPT_SSL_VERIFYHOST] = false;
        }
    }

    private function setUrl()
    {
        $url = $this->getClient()->getUrl() . self::WS . $this->getClient()->getRoute();
        if (is_numeric($this->getClient()->getRegister()) && $this->getClient()->getRegister() > 0) {
            $url .= DIRECTORY_SEPARATOR . $this->getClient()->getRegister();
        }
        $this->options[CURLOPT_URL] = filter_var($url, FILTER_VALIDATE_URL);
    }

    private function setCustomRequest()
    {
        $this->options[CURLOPT_CUSTOMREQUEST] = $this->getClient()->getMethod();
    }

    private function setPostFields()
    {
        $postFields = $this->getClient()->getParams();
        if (is_array($postFields) && count($postFields) > 0) {
            $this->options[CURLOPT_POSTFIELDS] = json_encode($postFields);
        }
    }

    private function setCurlOptions()
    {
        curl_setopt_array($this->curl, $this->getOptions());
    }

    public function request()
    {
        $this->setOptions();
        $this->setCurlOptions();
        $this->exec();
        return $this->getClient()->isResponseArray() ? json_decode($this->response, true) : $this->response;
    }

    private function exec()
    {
        $this->setCurlOptions();
        $this->response = curl_exec($this->curl);
        $this->curlError = curl_error($this->curl);
    }

    public function __destruct()
    {
        curl_close($this->curl);
        unset($this->curl);
    }
}