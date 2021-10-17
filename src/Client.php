<?php

namespace IXClientAPI;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\HttpClient\RequestClient;

class Client
{
    private string $token;
    private string $url;
    private string $route;
    private string $method = 'POST';
    private bool $selfSigned = false;
    private int $register = 0;
    private array $params = [];
    private bool $responseArray = false;
    private bool $list = false;

    public function __construct(string $route, string $url, bool $selfSigned = false)
    {
        $this->setRoute($route);
        $this->setUrl($url);
        $this->setSelfSigned($selfSigned);
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function isSelfSigned(): bool
    {
        return $this->selfSigned;
    }

    public function setSelfSigned(bool $selfSigned): void
    {
        $this->selfSigned = $selfSigned;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function getRegister(): int
    {
        return $this->register;
    }

    public function setRegister(int $register): void
    {
        $this->register = $register;
    }

    public function isResponseArray(): bool
    {
        return $this->responseArray;
    }

    public function setResponseArray(bool $responseArray): void
    {
        $this->responseArray = $responseArray;
    }

    public function isList(): bool
    {
        return $this->list;
    }

    public function setList(bool $list): void
    {
        $this->list = $list;
    }

    /**
     * @throws GuzzleException
     */
    public function run()
    {
        $CurlRequest = new RequestClient();
        $CurlRequest->setClient($this);
        $CurlRequest->setData();
        return $CurlRequest->request();
    }
}
