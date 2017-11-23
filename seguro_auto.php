<?php

/*
  Plugin Name: seguro Auto
  Description: módulo para formulário de seguro auto.
  Author: Horácio
  Version: 1
  Author URI: http://planet1.com.br
 */

require_once 'classes/Mysql.php';

use classes\Mysql\Mysql as db;

db::$tabela       = "teste";
db::$obrigatorios = ['info2'];


add_shortcode("teste", function() {
    db::create(['info' => "teste", 'info2' => 'te']); //all("select nome from tabela limit 5");
    echo db::$consulta;
    echo db::$mensagem;
});
