<?php

namespace classes\cliente;

use classes\Mysql\Mysql as modeloCliente;

class cliente extends modeloCliente {

    public function __construct() {
        self::$tabela = "cliente";
        self::$campos = ['nome', 'cpf', 'rg'];
    }










    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }










}
