<?php

/* Inserir Tarefa em processo */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Processo\ProcessoResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

require_once 'vendor/autoload.php';

try {
    $Client = new Client(ProcessoResource::INSERIR_TAREFA_EM_PROCESSO, 'https://HOST', true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'id_processo' => 1,
        'id_setor' => 2,
        'sequencia' => 1,
        'descricao' => 'Minha tarefa',
        'prazo_minutos' => 20,
    ]);
    $Client->setResponseArray(true);
    $ProcessoResource = new ProcessoResource($Client);
    $response = $ProcessoResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
