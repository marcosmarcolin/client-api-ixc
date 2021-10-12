<?php

namespace IXClientAPI;

use IXClientAPI\HttpClient\CurlRequest;

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

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * @return int
     */
    public function getRegister(): int
    {
        return $this->register;
    }

    /**
     * @param int $register
     */
    public function setRegister(int $register): void
    {
        $this->register = $register;
    }

    /**
     * @return bool
     */
    public function isResponseArray(): bool
    {
        return $this->responseArray;
    }

    /**
     * @param bool $responseArray
     */
    public function setResponseArray(bool $responseArray): void
    {
        $this->responseArray = $responseArray;
    }

    /**
     * @return bool
     */
    public function isList(): bool
    {
        return $this->list;
    }

    /**
     * @param bool $list
     */
    public function setList(bool $list): void
    {
        $this->list = $list;
    }

    public function run()
    {
        $CurlRequest = new CurlRequest();
        $CurlRequest->setClient($this);
        return $CurlRequest->request();
    }
}