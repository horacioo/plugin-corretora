<?php

/*
  Plugin Name: Plugin de Formulario com Cadastro em banco!!!
  Description: módulo para formulário de site.
  Author: Horácio
  Version: 1.1
  Author URI: http://planet1.com.br
 */

require_once 'pl1_classes/entidades.php';
require_once 'pl1_classes/ClassePL1_Request.php';
require_once 'pl1_classes/Mysql_core.php';
require_once 'pl1_classes/formulario.php';
require_once 'classes_Novas/ClasseDeClientes.php';
require_once 'classes_Novas/ClasseDeEmails.php';
require_once 'classes_Novas/ClasseDeclientes_email.php';
require_once 'classes_Novas/ClasseDeTelefone.php';
require_once 'classes_Novas/ClasseDeclientes_telefone.php';
require_once 'funcoes/paginas.php';


use pl1\entidades as ent;
use pl1\ClassePL1_Mysql as sql;
use pl1\ClassePL1_Formulario as form;
use Extras\cliente as cli;
use Extras\email as E;
use Extras\clientes_email as CE; //use CEmail\clientes_email as CE;
use Extras\Telefone as Tel; //use Tel\Telefone as tel;
use Extras\clientes_Telefone as TelCl;



add_action('admin_menu', 'MenuClientes');












function Salvar($dados = '') {

    new cli();
    cli::criar($dados);
    new E();
    E::criar($dados);
    new CE();
    CE::criar(CE::$array);
    new Tel();
    Tel::criar($dados);
    new TelCl();
    TelCl::criar(TelCl::$array);
}





register_activation_hook('seguro_auto', ent::tabela_Cliente());


add_shortcode("formLead", function($atts) {

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


    if (isset($_POST[form::nomeForm()])){
        return Salvar($_POST[form::nomeForm()]);
    }

    return $return;
});











