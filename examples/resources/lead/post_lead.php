<?php

/* Inserir Lead */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Lead\LeadResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(LeadResource::INSERIR_LEAD, 'https://HOST', true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'nome' => 'Nome',
        'data_cadastro' => '20/10/2021',
        'email' => 'email@ixcsoft.com.br'
    ]);
    $Client->setResponseArray(true);
    $LeadResource = new LeadResource($Client);
    $response = $LeadResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
