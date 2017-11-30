<?php

namespace classes\email;

use classes\Mysql\Mysql as modeloCliente_Email;

class clientes_email extends modeloCliente_Email {

    public function __construct() {
        self::$tabela = "clientes_email";
        self::$campos = ['email','cliente'];
    }










    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }










}
