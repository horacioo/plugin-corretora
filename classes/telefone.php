<?php

namespace classes\telefone;

use classes\Mysql\Mysql as modeloTelefone;

class telefone extends modeloTelefone {

    public function __construct() {
        self::$tabela = "telefone";
        self::$campos = ['telefone'];
    }










    public static function criar($dados='') {
       self::create(self::Request($dados));
    }










}
