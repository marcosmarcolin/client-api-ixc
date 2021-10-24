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
    const LISTAR_BOLETOS_EM_ABERTO = 'fn_areceber';
    const LISTAR_BOLETOS_PAGOS_POR_DATA = 'fn_areceber';
    const RECEBER_TITULO = 'fn_areceber_recebimentos_baixas_novo';
    const DADOS_BOLETO = 'get_boleto';
    const RETORNAR_ARQUIVO_DE_BOLETO = 'get_boleto';
    const ENVIAR_BOLETO_POR_EMAIL = 'get_boleto';
    const ENVIAR_BOLETO_POR_SMS = 'get_boleto';

    /**
     * @throws GuzzleException
     */
    public function execDefault()
    {
        return $this->run($this->Client);
    }
}
