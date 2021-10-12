<?php

/* Atualizar */

use IXClientAPI\Client;
use IXClientAPI\HttpClient\CurlRequest;

require_once '../vendor/autoload.php';

try {
    $Client = new Client('usuarios', 'https://HOST', true);
    $Client->setMethod(CurlRequest::PUT);
    $Client->setToken('28:fabf2d13ff9fad48dc6838293dfd83bc31cd7d52eefa798c89b73359856ed81d');
    $Client->setRegister(0);
    $Client->setParams(
        [
            "nome" => "Nome completo",
            "pagamentos_dia_atual" => "N",
            "email" => "teste@ixcsoft.com.br",
            "id_grupo" => "1",
            "recebimentos_dia_atual" => "N",
            "lancamentos_dia_atual" => "S",
            "senha" => "123456"
        ]);
    $response = $Client->run();
    echo '<pre>';
    var_dump($response);
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
