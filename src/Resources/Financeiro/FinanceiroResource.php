<?php

namespace IXClientAPI\Resources\Financeiro;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Interfaces\ResourcesInterface;
use IXClientAPI\Resources\Resources;

class FinanceiroResource extends Resources implements ResourcesInterface
{
    const LISTAR_CONTAS = 'contas';
    const LISTAR_PEDIDOS_VENDA = 'vd_pedido_venda';

    const IMPRIMIR_NOTA = 'imprimir_nota';

    const DADOS_BOLETO = 'get_boleto';
    const LISTAR_BOLETOS_EM_ABERTO = 'fn_areceber';
    const LISTAR_BOLETOS_PAGOS_POR_DATA = 'fn_areceber';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
