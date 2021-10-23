<?php

/* Imprimir Nota */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Financeiro\FinanceiroResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FinanceiroResource::IMPRIMIR_NOTA, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'id' => '1',
        'base64' => 'S'
    ]);
    $Client->setResponseArray(true);
    $FinanceiroResource = new FinanceiroResource($Client);
    $response = $FinanceiroResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
