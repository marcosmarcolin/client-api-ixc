<?php

/* Enviar boleto por email */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Financeiro\FinanceiroResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FinanceiroResource::ENVIAR_BOLETO_POR_EMAIL, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'boletos' => '144173',
        'juro' => 'N',
        'multa' => 'N',
        'atualiza_boleto' => 'N',
        'tipo_boleto' => 'mail'
    ]);
    $Client->setResponseArray(true);
    $FinanceiroResource = new FinanceiroResource($Client);
    $response = $FinanceiroResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
