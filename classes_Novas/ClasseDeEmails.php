<?php

namespace Extras;

use pl1\ClassePL1_Mysql as ModeloCliente;

class email extends ModeloCliente
    {

  

    public function __construct() {
        self::$tabela = "email";
        self::$campos = ['email'];
    }





    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }





    }
