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
            "Authorization: Basic " . base64_encode($this->Client->getToken()),
            self::CONTENT_TYPE,
        ];
        if ($this->Client->isList() === true) {
            $this->options[CURLOPT_HTTPHEADER][] = self::IXC_LISTAR;
        }
    }

    private function setSelfAssigned()
    {
        if ($this->Client->isSelfSigned() === true) {
            $this->options[CURLOPT_SSL_VERIFYPEER] = false;
            $this->options[CURLOPT_SSL_VERIFYHOST] = false;
        }
    }

    private function setUrl()
    {
        $url = $this->Client->getUrl() . self::WS . $this->Client->getRoute();
        if (is_numeric($this->Client->getRegister()) && $this->Client->getRegister() > 0) {
            $url .= DIRECTORY_SEPARATOR . $this->Client->getRegister();
        }
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->options[CURLOPT_URL] = $this->Client->getUrl() . self::WS . $this->Client->getRoute();
        }
    }

    private function setCustomRequest()
    {
        $this->options[CURLOPT_CUSTOMREQUEST] = $this->Client->getMethod();
    }

    private function setPostFields()
    {
        $postFields = $this->Client->getParams();
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
        return $this->Client->isResponseArray() ? json_decode($this->response, true) : $this->response;
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