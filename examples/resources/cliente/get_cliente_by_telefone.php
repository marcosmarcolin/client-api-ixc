<?php

/*Listar cliente por Telefone, percorrer todos os campos e adiciona no Array */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Cliente\ClienteResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $fone = '(XX) XXXX-XXXX';
    $fields = ['telefone_celular', 'fone', 'telefone_comercial', 'whatsapp', 'ramal'];
    $clientes = [];

    $Client = new Client(ClienteResource::LISTAR_CLIENTE_POR_TELEFONE, 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');

    foreach ($fields as $field) {
        $Client->setParams([
            'qtype' => $field,
            'query' => $fone,
            'oper' => '=',
            'page' => '1',
            'rp' => '20',
            'sortname' => 'cliente.id',
            'sortorder' => 'desc'
        ]);
        $Client->setResponseArray(true);
        $ClienteResource = new ClienteResource($Client);
        $response = $ClienteResource->execDefault();
        if ($response['contents']['total'] > 0) {
            $clientes[] = $response;
        }
    }

    echo '<pre>';
    var_dump($clientes);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
