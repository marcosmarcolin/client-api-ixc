<?php

/* Listar Pedidos de venda */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Financeiro\FinanceiroResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FinanceiroResource::LISTAR_PEDIDOS_VENDA, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'qtype' => 'pedido.id',
        'query' => '1',
        'oper' => '=',
        'page' => '1',
        'rp' => '20',
        'sortname' => 'pedido.id',
        'sortorder' => 'desc'
    ]);
    $Client->setResponseArray(true);
    $FinanceiroResource = new FinanceiroResource($Client);
    $response = $FinanceiroResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
