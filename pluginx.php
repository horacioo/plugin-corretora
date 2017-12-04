<?php

/*
  Plugin Name: pluginX
  Description: módulo para formulário de site.
  Author: Horácio
  Version: 1
  Author URI: http://planet1.com.br
 */

use pl1\ClassePL1_Mysql as sql;
use pl1\ClassePL1_Formulario as form;

add_shortcode("formLead", function($atts) {

    if (isset($atts['campos'])) {
        $return = "<section id='teste'>";
        $return .= "apenas um teste";
        $return . "</section>";
    }
    return $return;
});
