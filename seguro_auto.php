<?php

/*
  Plugin Name: seguro Auto!
  Description: módulo para formulário de seguro auto.
  Author: Horácio
  Version: 1
  Author URI: http://planet1.com.br
 */

require_once 'classes/Mysql.php';
require_once 'classes/formulario.php';

use classes\Mysql\Mysql as seguroAuto;
use classes\Formulario\Formulario as form;

seguroAuto::$tabela = "email";
//db::$obrigatorios = ['info2'];


add_shortcode("formLead", function($atts) {
    if (isset($atts['campos'])){
        $return = "<section id='section'>";
        if(isset($atts['titulo'])){$return.="<h2>".$atts['titulo']."</h2>";}
        $return .= "<form action='' method='POST' >";
        $campos = $atts['campos'];
        $campos = explode(",", $campos);
        foreach ($campos as $x):
            $input = trim($x);
            if (in_array($input, form::$campos)){
                $return .= form::$input();
            } else{
                $return .= "<p><label>$input:</label><input type='text' required='required' name='" . $input . "' id='" . $input . "Form' ></p>";
            }
        endforeach;
        $return .= "<input type='submit' value='enviar' id='formSubmit'>";
        $return .= "</form>";
        $return .= "</section>";
     }
    return $return;
});

