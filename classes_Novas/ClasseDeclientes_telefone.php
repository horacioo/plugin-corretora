<?php

namespace Extras;

use pl1\ClassePL1_Mysql as ModeloCliente;

class clientes_Telefone extends ModeloCliente
    {

    public function __construct() {
        self::$tabela = "clientes_telefone";
        self::$campos = ['cliente', 'telefone'];
    }





    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }





    }
