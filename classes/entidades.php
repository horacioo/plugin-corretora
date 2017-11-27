<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of entidades
 *
 * @author horacio
 */
class entidades
    {

    public static function tabela_Cliente() {
        $sql = "CREATE TABLE if not exist `cliente` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `nome` int(11) NOT NULL,
                  `cpf` int(11) NOT NULL,
                  `rg` int(11) NOT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `cpf` (`cpf`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    }





    }
