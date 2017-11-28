<?php

namespace classes\Formulario;

class Formulario {

    static $campos = [
        'email',
        'profissao'
    ];

    static public function email() {
        return "<p><label>E-mail:</label><input type='email' required='required' name=" . self::nomeForm() . "[email] id='emailForm' ></p>";
    }










    static public function profissao() {
        return "<p><label>profissão:</label><select name=" . self::nomeForm() . "[profissao]><option value='#'>selecione</option></select></p>";
    }










    static public function nomeForm() {
        return md5($_SERVER["REMOTE_ADDR"]);
    }










}
