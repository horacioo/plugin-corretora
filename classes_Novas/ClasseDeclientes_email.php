<?php

namespace Extras;

use pl1\ClassePL1_Mysql as ModeloCliente;

class clientes_email extends ModeloCliente
    {

    public function __construct() {
        self::$tabela = "clientes_email";
        self::$campos = ['cliente', 'email'];
    }





    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }





    }
