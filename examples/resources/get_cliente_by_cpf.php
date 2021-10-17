<?php

/* Listar cliente por CPF */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Cliente\ClienteResource;
use IXClientAPI\Resources\Resources;

require_once '../../vendor/autoload.php';

/* Listagem de clientes por CPF */
try {
    $ClientResource = new ClienteResource(Resources::LISTAR_CLIENTE_POR_CPF, 'https://HOST', true);
    $ClientResource->setList(true);
    $ClientResource->setMethod(RequestClient::POST);
    $ClientResource->setToken('seu_token');
    $ClientResource->setParams([
        'qtype' => 'cnpj_cpf',
        'query' => 'XXX-XXX-XXX-XX',
        'oper' => '=',
        'page' => '1',
        'rp' => '20',
        'sortname' => 'cliente.id',
        'sortorder' => 'desc'
    ]);
    $ClientResource->setResponseArray(true);
    $clientes = $ClientResource->run();
    var_dump($clientes);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}

