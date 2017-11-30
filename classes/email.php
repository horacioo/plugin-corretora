<?php

namespace classes\email;

use classes\Mysql\Mysql as modeloEmail;

class email extends modeloEmail {

    public function __construct() {
        self::$tabela = "email";
        self::$campos = ['email'];
    }










    public static function criar($dados = '') {
        self::create(self::Request($dados));
    }










}
