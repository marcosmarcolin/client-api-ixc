<?php

/* Listar cliente por CPF */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Cliente\ClienteResource;

require_once '../../vendor/autoload.php';

try {
    $Client = new Client(ClienteResource::LISTAR_CLIENTE_POR_CPF, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'qtype' => 'cnpj_cpf',
        'query' => 'XXX-XXX-XXX-XX',
        'oper' => '=',
        'page' => '1',
        'rp' => '20',
        'sortname' => 'cliente.id',
        'sortorder' => 'desc'
    ]);
    $Client->setResponseArray(true);
    $ClienteResource = new ClienteResource($Client);
    $response = $ClienteResource->getByCPF();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
