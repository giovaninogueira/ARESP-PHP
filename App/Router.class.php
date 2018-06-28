<?php

namespace App;

use SkyfallFramework\Common\Routes\Routes;

/**
 * Class Router
 * @package App
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Router
{
    /**
     * @details Configurando rotas
     */
    public static function routes()
    {
        $routes = new Routes();
        /**
         * @details Rotas Banco
         */
        $routes->get('/Bancos', 'Banco')->auth(false);
        $routes->get('/Banco/:id', 'Banco')->auth(false);
        $routes->delete('/Banco/:id', 'Banco')->auth(false);
        $routes->post('/Banco', 'Banco')->contents(['nome', 'numero', 'telefone'])->auth(false);
        $routes->put('/Banco/:id', 'Banco')->contents(['id', 'nome', 'numero', 'telefone'])->auth(false);

        /**
         * @details Rotas Agencia
         */
        $routes->get('/Agencias', 'Agencia')->auth(false);
        $routes->get('/Agencia/:id', 'Agencia')->auth(false);
        $routes->delete('/Agencia/:id', 'Agencia')->auth(false);
        $routes->post('/Agencia', 'Agencia')->contents(['numero', 'digito', 'telefone', 'gerente', 'banco'])->auth(false);
        $routes->put('/Agencia/:id', 'Agencia')->contents(['id', 'numero', 'digito', 'telefone', 'gerente', 'banco'])->auth(false);

        /**
         * @details Rotas Categoria Pagamento
         */
        $routes->get('/CategoriasPagamento', 'Categoria_pagamento')->auth(false);
        $routes->get('/CategoriaPagamento/:id', 'Categoria_pagamento')->auth(false);
        $routes->delete('/CategoriaPagamento/:id', 'Categoria_pagamento')->auth(false);
        $routes->post('/CategoriaPagamento', 'Categoria_pagamento')->contents(['nome'])->auth(false);
        $routes->put('/CategoriaPagamento/:id', 'Categoria_pagamento')->contents(['id', 'nome'])->auth(false);

        /**
         * @details Rotas Categoria Recebimento
         */
        $routes->get('/CategoriasRecebimento', 'Categoria_recebimento')->auth(false);
        $routes->get('/CategoriaRecebimento/:id', 'Categoria_recebimento')->auth(false);
        $routes->delete('/CategoriaRecebimento/:id', 'Categoria_recebimento')->auth(false);
        $routes->post('/CategoriaRecebimento', 'Categoria_recebimento')->contents(['nome'])->auth(false);
        $routes->put('/CategoriaRecebimento/:id', 'Categoria_recebimento')->contents(['id', 'nome'])->auth(false);

        /**
         * @details Rotas Fornecedor
         */
        $routes->get('/Fornecedores', 'Fornecedor')->auth(false);
        $routes->get('/Fornecedor/:id', 'Fornecedor')->auth(false);
        $routes->delete('/Fornecedor/:id', 'Fornecedor')->auth(false);
        $routes->post('/Fornecedor', 'Fornecedor')->contents(['cadastro', 'cnpj', 'contato', 'email', 'fantasia', 'razao', 'telefone'])->auth(false);
        $routes->put('/Fornecedor/:id', 'Fornecedor')->contents(['id', 'cadastro', 'cnpj', 'contato', 'email', 'fantasia', 'razao', 'telefone'])->auth(false);

        /**
         * @details Rotas Empresas
         */
        $routes->get('/Empresas', 'Empresa')->auth(false);
        $routes->get('/Empresa/:id', 'Empresa')->auth(false);
        $routes->delete('/Empresa/:id', 'Empresa')->auth(false);
        $routes->post('/Empresa', 'Empresa')->contents(['razao', 'fantasia', 'cnpj'])->auth(false);
        $routes->put('/Empresa/:id', 'Empresa')->contents(['id', 'razao', 'fantasia', 'cnpj'])->auth(false);

        /**
         * @details Rotas Tipo Socio
         */
        $routes->get('/tiposSocio', 'Tipo_socio')->auth(false);
        $routes->get('/tipoSocio/:id', 'Tipo_socio')->auth(false);
        $routes->delete('/tipoSocio/:id', 'Tipo_socio')->auth(false);
        $routes->post('/tipoSocio', 'Tipo_socio')->contents(['nome'])->auth(false);
        $routes->put('/tipoSocio/:id', 'Tipo_socio')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Secretaria
         */
        $routes->get('/Secretarias', 'Secretaria')->auth(false);
        $routes->get('/Secretaria/:id', 'Secretaria')->auth(false);
        $routes->delete('/Secretaria/:id', 'Secretaria')->auth(false);
        $routes->post('/Secretaria', 'Secretaria')->contents(['nome'])->auth(false);
        $routes->put('/Secretaria/:id', 'Secretaria')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Operadora
         */
        $routes->get('/Operadoras', 'Operadora')->auth(false);
        $routes->get('/Operadora/:id', 'Operadora')->auth(false);
        $routes->delete('/Operadora/:id', 'Operadora')->auth(false);
        $routes->post('/Operadora', 'Operadora')->contents(['nome'])->auth(false);
        $routes->put('/Operadora/:id', 'Operadora')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Tipo de recebimento
         */
        $routes->get('/TiposRecebimento', 'Tipo_recebimento')->auth(false);
        $routes->get('/TipoRecebimento/:id', 'Tipo_recebimento')->auth(false);
        $routes->delete('/TipoRecebimento/:id', 'Tipo_recebimento')->auth(false);
        $routes->post('/TipoRecebimento', 'Tipo_recebimento')->contents(['nome'])->auth(false);
        $routes->put('/TipoRecebimento/:id', 'Tipo_recebimento')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Status Parcela
         */
        $routes->get('/StatusParcelas', 'Status_parcela')->auth(false);
        $routes->get('/StatusParcela/:id', 'Status_parcela')->auth(false);
        $routes->delete('/StatusParcela/:id', 'Status_parcela')->auth(false);
        $routes->post('/StatusParcela', 'Status_parcela')->contents(['nome','descricao'])->auth(false);
        $routes->put('/StatusParcela/:id', 'Status_parcela')->contents(['id','nome','descricao'])->auth(false);

        /**
         * @details Rotas Status Parcela
         */
        $routes->get('/Recebimentos', 'Recebimento')->auth(false);
        $routes->get('/Recebimento/:id', 'Recebimento')->auth(false);
        $routes->delete('/Recebimento/:id', 'Recebimento')->auth(false);
        $routes->post('/Recebimento', 'Recebimento')->contents(
            [
                'categoria',
                'cliente',
                'conta',
                'descricao',
                'dtCompetencia',
                'dtVencimento',
                'grupo',
                'ocorrencia',
                'remessaGerada',
                'situacao',
                'valor'
            ]
        )->auth(false);
        $routes->put('/Recebimento/:id', 'Recebimento')->contents(
            [
                'categoria',
                'cliente',
                'conta',
                'descricao',
                'dtCompetencia',
                'dtEmissao',
                'dtVencimento',
                'grupo',
                'ocorrencia',
                'remessagerada',
                'situacao',
                'valor',
                'id'
            ]
        )->auth(false);

        /**
         * @details Rotas Grupos
         */
        $routes->get('/GruposRecebimento', 'Grupo_recebimento')->auth(false);
        $routes->get('/GrupoRecebimento/:id', 'Grupo_recebimento')->auth(false);
        $routes->delete('/GrupoRecebimento/:id', 'Grupo_recebimento')->auth(false);
        $routes->post('/GrupoRecebimento', 'Grupo_recebimento')->contents(['nome'])->auth(false);
        $routes->put('/GrupoRecebimento/:id', 'Grupo_recebimento')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Clientes
         */
        $routes->get('/Clientes', 'Cliente')->auth(false);
        $routes->get('/Cliente/:id', 'Cliente')->auth(false);
        $routes->delete('/Cliente/:id', 'Cliente')->auth(false);
        $routes->post('/Cliente', 'Cliente')->contents(
            [
                'cadastro','cancelado','cpf','dadosBancarios','dependentes','email','endereco',
                'estadoCivil','grupo','mae','nascimento','nome','obs','pai','rg','secretaria',
                'sexo','situacao','telefones','tipo','numAverbacao','ativo','matricula'
            ]
        )->auth(false);
        $routes->put('/Cliente/:id', 'Cliente')->contents(
            [
                'cadastro','cancelado','cpf','dadosBancarios','dependentes','email','endereco',
                'estadoCivil','grupo','mae','nascimento','nome','obs','pai','rg','secretaria',
                'sexo','situacao','telefones','tipo','id','numAverbacao','ativo'
            ]
        )->auth(false);

        /**
         * @details Rotas Convenio
         */
        $routes->get('/Convenios', 'Convenio')->auth(false);
        $routes->get('/Convenio/:id', 'Convenio')->auth(false);
        $routes->delete('/Convenio/:id', 'Convenio')->auth(false);
        $routes->post('/Convenio', 'Convenio')->contents(
            [
                'nome',
                'numero',
                'telefone',
                'conta',
                'conta_caixa_id',
                'observacao'
            ]
        )->auth(false);
        $routes->put('/Convenio/:id', 'Convenio')->contents(
            [
                'id',
                'nome',
                'numero',
                'telefone',
                'conta',
                'conta_caixa_id',
                'observacao'
            ]
        )->auth(false);

        /**
         * @details Rotas Grupos
         */
        $routes->get('/ContasCaixa', 'Conta_caixa')->auth(false);
        $routes->get('/ContaCaixa/:id', 'Conta_caixa')->auth(false);
        $routes->delete('/ContaCaixa/:id', 'Conta_caixa')->auth(false);
        $routes->post('/ContaCaixa', 'Conta_caixa')->contents(
            [
                'numero',
                'digito',
                'nome',
                'tipo',
                'taxa_multa',
                'taxa_juros',
                'empresa',
                'agencia'
            ]
        )->auth(false);
        $routes->put('/ContaCaixa/:id', 'Conta_caixa')->contents([
            'id',
            'numero',
            'digito',
            'nome',
            'tipo',
            'taxa_multa',
            'taxa_juros',
            'empresa',
            'agencia'
        ]
        )->auth(false);

        /**
         * @details Rotas Contas a pagar
         */
        $routes->get('/Pagamentos', 'Pagamento')->auth(false);
        $routes->get('/Pagamento/:id', 'Pagamento')->auth(false);
        $routes->delete('/Pagamento/:id', 'Pagamento')->auth(false);
        $routes->post('/Pagamento', 'Pagamento')->contents(
            [
                'categoria',
                'cheque',
                'chequeEmitido',
                'conta',
                'descricao',
                'documento',
                'dtCompetencia',
                'dtVencimento',
                'fornecedor',
                'numNf',
                'referecia',
                'situacao',
                'valor'
            ]
        )->auth(false);
        $routes->put('/Pagamento/:id', 'Pagamento')->contents(
            [
                'categoria',
                'cheque',
                'chequeEmitido',
                'conta',
                'descricao',
                'documento',
                'dtCompetencia',
                'dtVencimento',
                'fornecedor',
                'numNf',
                'referecia',
                'situacao',
                'valor',
                'id'
            ]
        )->auth(false);
    }
}