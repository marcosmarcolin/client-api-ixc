<?php

/* Inserir Fornecedor */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Fornecedor\FornecedorResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(FornecedorResource::CADASTRAR_FORNECEDOR, 'https://HOST', true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'razao' => 'Nome',
        'cidade' => '0',
        'data' => "XX/XX/XXXX",
        "ativo" => 'S',
        "tipo_pessoa" => 'J',
        "cpf_cnpj" => "XX.XXX.XXX/XXXX-XX"
    ]);
    $Client->setResponseArray(true);
    $ClienteResource = new FornecedorResource($Client);
    $response = $ClienteResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
