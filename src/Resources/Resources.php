<?php

namespace IXClientAPI\Resources;

abstract class Resources
{
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

    /* Fornecedor */
    const CADASTRAR_FORNECEDOR = 'fornecedor';

    /* Ticket */
    const INSERIR_ATENDIMENTO = 'su_ticket';
    const INSERIR_ATENDIMENTO_VALIDANDO_PROTOCOLO = 'su_ticket'; // TODO
    const GERAR_PROTOCOLO_ATENDIMENTO = 'gerar_protocolo_atendimento';
    const INSERIR_INTERACAO_EM_ATENDIMENTO = 'su_mensagens';
    const TRANSFERIR_ATENDIMENTO = 'su_transf_atendimento_26466';

    /* Recebimento */
    const DADOS_BOLETO = 'get_boleto';
    const ENVIAR_BOLETO_POR_EMAIL = 'get_boleto';
    const ENVIAR_BOLETO_POR_SMS = 'get_boleto';
    const LISTAR_BOLETOS_EM_ABERTO = 'fn_areceber';
    const LISTAR_BOLETOS_PAGOS_POR_DATA = 'fn_areceber';
    const RECEBER_TITULO = 'fn_areceber_recebimentos_baixas_novo';
    const RETORNAR_ARQUIVO_DE_BOLETO = 'get_boleto';

    /* Processo */
    const INSERIR_TAREFA_EM_PROCESSO = 'wfl_tarefa';

    /* Login */
    const DESCONECTAR_LOGIN = 'desconectar_clientes';
    const LIMPAR_MAC = 'radusuarios_25452';

    /* Lead */
    const INSERIR_LEAD = 'contato';

    /* Telefonia */
    const INSERIR_RAMAL_SIP = 'voip_sippeers';
    const LISTAR_REGISTROS_VOIP = 'cdr';

    /* Cliente */
    const LISTAR_CLIENTE_POR_TELEFONE = 'cliente';
    const LISTAR_CLIENTE_POR_CPF = 'cliente';

    /* Financeiro em Geral */
    const LISTAR_CONTAS = 'contas';
    const LISTAR_PEDIDOS_VENDA = 'vd_pedido_venda';
    const IMPRIMIR_NOTA = 'imprimir_nota';

    /* Rede em Geral */
    const LISTAR_OCORRENCIAS_SOLUCOES = 'radpop_ocorrencias';
    const LISTAR_CLIENTES_FIBRA = 'radpop_radio_cliente_fibra';
    const LISTAR_PROJETOS = 'df_projeto';
    const VERIFICAR_VIABILIDADE_TECNICA = 'viabilidade_tecnica';
}