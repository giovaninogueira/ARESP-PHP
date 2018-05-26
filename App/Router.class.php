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
        $routes->post('/Banco', 'Banco')->contents(['nome','numero','telefone'])->auth(false);
        $routes->put('/Banco/:id', 'Banco')->contents(['id','nome','numero','telefone'])->auth(false);

        /**
         * @details Rotas Agencia
         */
        $routes->get('/Agencias', 'Agencia')->auth(false);
        $routes->get('/Agencia/:id', 'Agencia')->auth(false);
        $routes->delete('/Agencia/:id', 'Agencia')->auth(false);
        $routes->post('/Agencia', 'Agencia')->contents(['numero','digito','telefone','gerente','banco'])->auth(false);
        $routes->put('/Agencia/:id', 'Agencia')->contents(['id','numero','digito','telefone','gerente','banco'])->auth(false);

        /**
         * @details Rotas Categoria Pagamento
         */
        $routes->get('/CategoriasPagamento', 'Categoria_pagamento')->auth(false);
        $routes->get('/CategoriaPagamento/:id', 'Categoria_pagamento')->auth(false);
        $routes->delete('/CategoriaPagamento/:id', 'Categoria_pagamento')->auth(false);
        $routes->post('/CategoriaPagamento', 'Categoria_pagamento')->contents(['nome'])->auth(false);
        $routes->put('/CategoriaPagamento/:id', 'Categoria_pagamento')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Categoria Recebimento
         */
        $routes->get('/CategoriasRecebimento', 'Categoria_recebimento')->auth(false);
        $routes->get('/CategoriaRecebimento/:id', 'Categoria_recebimento')->auth(false);
        $routes->delete('/CategoriaRecebimento/:id', 'Categoria_recebimento')->auth(false);
        $routes->post('/CategoriaRecebimento', 'Categoria_recebimento')->contents(['nome'])->auth(false);
        $routes->put('/CategoriaRecebimento/:id', 'Categoria_recebimento')->contents(['id','nome'])->auth(false);

        /**
         * @details Rotas Fornecedor
         */
        $routes->get('/Fornecedores', 'Fornecedor')->auth(false);
        $routes->get('/Fornecedor/:id', 'Fornecedor')->auth(false);
        $routes->delete('/Fornecedor/:id', 'Fornecedor')->auth(false);
        $routes->post('/Fornecedor', 'Fornecedor')->contents(['cadastro','cnpj','contato','email','fantasia','razao','telefone'])->auth(false);
        $routes->put('/Fornecedor/:id', 'Fornecedor')->contents(['id','cadastro','cnpj','contato','email','fantasia','razao','telefone'])->auth(false);

        /**
         * @details Rotas Empresas
         */
        $routes->get('/Empresas', 'Empresa')->auth(false);
        $routes->get('/Empresa/:id', 'Empresa')->auth(false);
        $routes->delete('/Empresa/:id', 'Empresa')->auth(false);
        $routes->post('/Empresa', 'Empresa')->contents(['razao','fantasia','cnpj'])->auth(false);
        $routes->put('/Empresa/:id', 'Empresa')->contents(['id','razao','fantasia','cnpj'])->auth(false);
    }
}