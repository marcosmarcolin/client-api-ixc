<?php

/* Inserir ramal */

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Telefonia\TelefoniaResource;

$dir = dirname(__DIR__, 3);
require_once $dir . '/vendor/autoload.php';

try {
    $Client = new Client(TelefoniaResource::INSERIR_RAMAL_SIP, 'https://HOST', true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $Client->setParams([
        'id_contrato' => '1'
    ]);
    $Client->setResponseArray(true);
    $TelefoniaResource = new TelefoniaResource($Client);
    $response = $TelefoniaResource->execDefault();
    var_dump($response);
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
