<?php

/* Retornar arquivo boleto */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Financeiro\FinanceiroResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FinanceiroResource::RETORNAR_ARQUIVO_DE_BOLETO, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'boletos' => '144173',
        'juro' => 'N',
        'multa' => 'N',
        'atualiza_boleto' => 'N',
        'tipo_boleto' => 'arquivo',
        'base64' => 'S'
    ]);
    $Client->setResponseArray(true);
    $FinanceiroResource = new FinanceiroResource($Client);
    $response = $FinanceiroResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
