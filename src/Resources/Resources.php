<?php

namespace IXClientAPI\Resources;

use GuzzleHttp\Exception\GuzzleException;
use IXClientAPI\Client;
use IXClientAPI\HttpClient\RequestClient;

class Resources
{
    protected object $Client;

    public function __construct(Client $Client)
    {
        $this->Client = $Client;
    }

    /* Contrato */
    const PRODUTOS_DO_CONTRATO = ''; // TODO
    const ALTERAR_STATUS_DE_ACESSO_CONTRATO = 'cliente_contrato_15464';
    const ATIVAR_CONTRATO = 'cliente_contrato_ativar_cliente';
    const DESBLOQUEIO_CONFIANCA = 'desbloqueio_confianca';
    const DESCONTO_ADICIONAL = 'cliente_contrato_descontos_servicos';
    const INSERIR_PRODUTO_NO_CONTRATO = 'vd_contratos_produtos';
    const LIBERAR_TEMPORARIAMENTE = 'cliente_contrato_btn_lib_temp_24722';
    const LISTAR_COMODATOS = 'cliente_contrato_comodato';
    const LISTAR_CONTRATOS_POR_STATUS_ACESSO = 'cliente_contrato';
    const LISTAR_SERVICOS_ADICIONAIS_CONTRATO = 'cliente_contrato_servicos';
    const LIBERAR_DE_REDUCAO_DE_VELOCIDADE = 'liberacao_reducao_contrato_29157';

    /* OS */
    const ANALISAR_ORDEM_DE_SERVICO = 'su_oss_chamado_analisar';
    const DISPARAR_E_FINALIZAR_PROCESSO_DE_ATENDIMENTO = 'su_oss_chamado_fechar';
    const FINALIZAR_OS = 'su_oss_chamado_fechar';
    const INSERIR_COMODATO_AO_FINALIZAR_OS = 'su_oss_mov_comodato_wiz_novo';
    const ENCAMINHAR_OS = 'su_oss_chamado_alterar_setor';

    /* Ticket */
    const INSERIR_ATENDIMENTO = 'su_ticket';
    const INSERIR_ATENDIMENTO_VALIDANDO_PROTOCOLO = 'su_ticket'; // TODO
    const GERAR_PROTOCOLO_ATENDIMENTO = 'gerar_protocolo_atendimento';
    const INSERIR_INTERACAO_EM_ATENDIMENTO = 'su_mensagens';
    const TRANSFERIR_ATENDIMENTO = 'su_transf_atendimento_26466';

    /* Rede em Geral */
    const LISTAR_OCORRENCIAS_SOLUCOES = 'radpop_ocorrencias';
    const LISTAR_CLIENTES_FIBRA = 'radpop_radio_cliente_fibra';
    const LISTAR_PROJETOS = 'df_projeto';
    const VERIFICAR_VIABILIDADE_TECNICA = 'viabilidade_tecnica';

    /**
     * @throws GuzzleException
     */
    protected function run(Client $Client)
    {
        $RequestClient = new RequestClient();
        $RequestClient->setClient($Client);
        $RequestClient->setData();
        return $RequestClient->request();
    }
}
