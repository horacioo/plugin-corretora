<?php

namespace classes\Formulario;

class Formulario
    {

    static $campos = [
        'nome',
        'cpf',
        'email',
        'whatsapp',
        'profissao'
    ];

    static public function whatsapp() {
        return "<p><label>whatsapp:</label><input type='text' required='required' name=".self::nomeForm()."[whatsapp] id='whatsappForm' ></p>";
    }





    static public function nome() {
        return "<p><label>Nome:</label><input type='text' required='required' name=".self::nomeForm()."[nome] id='nomeForm' ></p>";
    }





    static public function cpf() {
        return "<p><label>Cpf:</label><input type='text' required='required' name='".self::nomeForm()."[cpf] id=\"cpfForm\" ></p>";
    }





    static public function email() {
        return "<p><label>E-mail:</label><input type='email' required='required' name=".self::nomeForm()."[email] id='emailForm' ></p>";
    }





    static public function profissao() {
        return "<p><label>profissão:</label><select name=".self::nomeForm()."[profissao]><option value='#'>selecione</option></select></p>";
    }





    static public function nomeForm() {
        return md5($_SERVER["REMOTE_ADDR"]);
    }





    }
