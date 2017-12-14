<?php

namespace Cliente;

use pl1\ClassePL1_Mysql as ModeloCliente;

class cliente extends ModeloCliente
    {

  

    public function __construct() {
        self::$tabela = "cliente";
        self::$campos = ['nome', 'cpf', 'rg'];
    }





    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }





    }
