<?php

/* Listar Registros de chamadas VoIP */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Telefonia\TelefoniaResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(TelefoniaResource::LISTAR_REGISTROS_VOIP, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'qtype' => 'cdr.id',
        'query' => '1',
        'oper' => '=',
        'page' => '1',
        'rp' => '20',
        'sortname' => 'cdr.id',
        'sortorder' => 'desc'
    ]);
    $Client->setResponseArray(true);
    $TelefoniaResource = new TelefoniaResource($Client);
    $response = $TelefoniaResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
