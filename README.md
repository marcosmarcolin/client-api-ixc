## Em desenvolvimento

# Cliente API escrita em PHP para consumir o IXCProvedor

Rotas e recursos implementados baseados na [Wiki API do IXCProvedor](https://wikiapiprovedor.ixcsoft.com.br).

### Rotas implementadas até o momento

Todas disponíveis.

### Recursos implementados até o momento

* Cliente
    * Listar clientes por CPF
    * Listar clientes por telefone
* Fornecedor
    * Cadastrar novo fornecedor
* Lead
    * Inserir Lead
* Processo
    * Inserir tarefa
* Financeiro
    * Listar contas
    * Listar pedidos de venda
    * Imprimir nota
    * Consultar dados do Boleto
    * Listar boletos abertos
    * Consultar boletos pagos por data
    * Receber título
    * Retornar arquivo do Boleto
    * Enviar boleto por email
    * Enviar boleto por SMS
* Logins
    * Limpar Mac
    * Desconectar clientes
* Telefonia
    * Inserir ramal
    * Listar registros de chamadas VoIP

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
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
~~~

## Recursos

Exemplos completos no diretório `examples/resources`.

Listar clientes por CPF

~~~php
use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;
use IXClientAPI\Resources\Cliente\ClienteResource;

require_once 'vendor/autoload.php';

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
    $response = $ClienteResource->execDefault();
} catch (GuzzleException $exception) {
    var_dump($exception->getMessage());
}
~~~

### Qualidade de código com Codesniffer

Para analisar:

`php ./vendor/bin/phpcs --extensions=php --standard=rules-code-sniffer.xml src/`

Para analisar e corrigir:

`php ./vendor/bin/phpcbf --extensions=php --standard=rules-code-sniffer.xml src/`

### Contribuições, dúvidas ou sugestões

marcos@ixcsoft.com.br