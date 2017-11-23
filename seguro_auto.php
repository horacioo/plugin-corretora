<?php
/*
  Plugin Name: seguro Auto
  Description: módulo para formulário de seguro auto.
  Author: Horácio
  Version: 1
  Author URI: http://planet1.com.br
 */

require_once 'classes/Mysql.php';

use classes\Mysql\Mysql as seguroAuto;

seguroAuto::$tabela       = "email";
//db::$obrigatorios = ['info2'];


add_shortcode("teste", function() {
    seguroAuto::create(['email' => array("lanterna_@hotmail.com",'rrrrr','555555')]); //all("select nome from tabela limit 5");
});
