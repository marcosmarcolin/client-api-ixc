<?php

/* Deletar */

use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;

require_once '../../vendor/autoload.php';

try {
    $Client = new Client('usuarios', 'https://HOST', true);
    $Client->setMethod(RequestClient::DELETE);
    $Client->setToken('Token');
    $Client->setRegister(0);
    $response = $Client->run();
    echo '<pre>';
    var_dump($response);
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
