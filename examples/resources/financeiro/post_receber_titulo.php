<?php

/* Receber titulo */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Financeiro\FinanceiroResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FinanceiroResource::RECEBER_TITULO, 'https://HOST', true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'filial_id' => '1',
        'id_receber' => '144174',
        'conta_' => '1',
        'id_conta' => '174',
        'tipo_recebimento' => 'D',
        'data' => '24/10/2021',
        'valor_parcela' => '37,10',
        'credito' => '37,10',
        'debito' => '37,10',
        'valor_total_recebido' => '37,10',
        'historico' => 'Recebimento XYZ',
        'previsao' => 'N',
        'tipo_lanc' => 'R',
    ]);
    $Client->setResponseArray(true);
    $FinanceiroResource = new FinanceiroResource($Client);
    $response = $FinanceiroResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
