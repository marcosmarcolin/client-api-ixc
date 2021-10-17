# Cliente API escrita em PHP para consumir o IXCProvedor

### Em desenvolvimento

Rotas e recursos implementados baseados na [Wiki API do IXCProvedor](https://wikiapiprovedor.ixcsoft.com.br).

## Rotas

Exemplos completos no diretório `examples/routes`.

Listar dados pela rota
~~~php
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;

require_once 'vendor/autoload.php';

try {
    $Client = new Client('route_name', 'https://HOST', true);
    $Client->setList(true);
    $Client->setMethod(RequestClient::POST);
    $Client->setToken('seu_token');
    $response = $Client->run();
    var_dump($response);
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
~~~

## Recursos

Exemplos completos no diretório `examples/resources`.

Listar clientes por CPF
~~~php
use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Cliente\ClienteResource;
use IXClientAPI\Resources\Resources;

require_once 'vendor/autoload.php';

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
~~~

### Contribuições, dúvidas ou sugestões

marcos@ixcsoft.com.br