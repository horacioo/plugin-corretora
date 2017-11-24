<?php
 namespace classes\Formulario;
class Formulario
    {
    static $campos=[
        'nome',
        'cpf',
        'email'
        ];

    
    
    static public function nome(){return "<p><label>Nome:</label><input type='text' required='required' name='nome' id='nomeForm' ></p>";}
    static public function cpf(){return "<p><label>Cpf:</label><input type='text' required='required' name='cpf' id=\"cpfForm\" ></p>";}
    static public function email(){return "<p><label>E-mail:</label><input type='email' required='required' name='email' id='emailForm' ></p>";}
    
    
    }
