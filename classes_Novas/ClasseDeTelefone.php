<?php

namespace Extras;

use pl1\ClassePL1_Mysql as ModeloCliente;

class Telefone extends ModeloCliente
    {

    public function __construct() {
        self::$tabela = "telefone";
        self::$campos = ['telefone'];
    }





    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }





    }
