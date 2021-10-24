<?php

/* Consultar boletos em aberto */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Financeiro\FinanceiroResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FinanceiroResource::LISTAR_BOLETOS_EM_ABERTO, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'qtype' => 'fn_areceber.id_cliente',
        'query' => '6',
        'oper' => '=',
        'rp' => '20',
        'sortname' => 'fn_areceber.data_vencimento',
        'sortorder' => 'asc',
        'grid_param' => json_encode(
            [
                ['TB' => 'fn_areceber.liberado', 'OP' => '=', 'P' => 'S'],
                ['TB' => 'fn_areceber.status', 'OP' => '!=', 'P' => 'C'],
                ['TB' => 'fn_areceber.status', 'OP' => '!=', 'P' => 'R']
            ]
        )
    ]);
    $Client->setResponseArray(true);
    $FinanceiroResource = new FinanceiroResource($Client);
    $response = $FinanceiroResource->execDefault();
    echo '<pre>';
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
