<?php

/* Listar */

use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;

require_once '../../vendor/autoload.php';

try {
    $Client = new Client('usuarios', 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('Token');
    $response = $Client->run();
    var_dump($response);
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
