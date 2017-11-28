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
require_once 'classes/entidades.php';

use classes\Mysql\Mysql as seguroAuto;
use classes\Formulario\Formulario as form;
use classes\entidades\entidades as ent;

seguroAuto::$tabela = "email";
//db::$obrigatorios = ['info2'];



register_activation_hook('seguro_auto', ent::tabela_Cliente());




add_shortcode("formLead", function($atts) {
    if (isset($_POST)) {
        salva();
    }
    if (isset($atts['campos'])) {
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
        <script>
            jQuery('document').ready(function () {
                jQuery("#nomeForm").keyup(function () {
                    this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g, '');
                });
                jQuery(function ($) {
                    jQuery("#placaForm").mask("aaa-9999");
                    jQuery("#telefoneForm").mask("(99)9999-9999");
                    jQuery("#celularForm").mask("(99)9-9999-9999");
                    jQuery("#whatsappForm").mask("(99)9-9999-9999");
                    jQuery("#cpfForm").mask("999.999.999-99");
                    jQuery("#data").mask("99/99/9999", {placeholder: "mm/dd/yyyy"});
                });
            });
        </script>
        <?php

        $return = "<section id='" . form::nomeForm() . "'>";
        if (isset($atts['titulo'])) {
            $return .= "<h2>" . $atts['titulo'] . "</h2>";
        }
        $return .= "<form action='#" . form::nomeForm() . "' method='post' name=" . form::nomeForm() . "[] >";
        $campos = $atts['campos'];
        $campos = explode(",", $campos);

        foreach ($campos as $x):
            $input = trim($x);
            if (in_array($input, form::$campos)) {
                $return .= form::$input();
            } else {
                $return .= "<p><label>$input:</label><input type='text' required='required' name=" . form::nomeForm() . "[" . $input . "] class='data'  id='" . $input . "Form' ></p>";
            }
        endforeach;

        $return .= "<input type='submit' value='enviar' id='formSubmit'>";
        $return .= "</form>";
        $return .= "</section>";
    }
    return $return;
});




function salva() {
    $data = "";
    if (isset($_POST[form::nomeForm()])):

        $dados  = $_POST[form::nomeForm()];
        $chaves = array_keys($dados);
                      
        foreach ($chaves as $c):
            $data .= "<p> $c : " . $dados[$c] . "</p>";
        endforeach;

        
        seguroAuto::$tabela="cliente";
        $x = ent::Request([$dados, seguroAuto::$tabela]);
        seguroAuto::create(ent::$insert);
       
        
    endif;
}










