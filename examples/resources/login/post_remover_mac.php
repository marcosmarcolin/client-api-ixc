<?php

/* Desconectar clientes */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Login\LoginResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(LoginResource::LIMPAR_MAC, 'https://HOST', true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'get_id' => '1',
    ]);
    $Client->setResponseArray(true);
    $LoginResource = new LoginResource($Client);
    $response = $LoginResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
