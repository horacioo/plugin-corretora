<?php

namespace pl1;

class entidades {

    public static function tabela_Cliente() {
        self::Clientes();
        self::Emails();
        self::ClientesEmails();
        self::Telefone();
        self::ClienteTelefone();
    }










    private static function Clientes() {
        global $wpdb;
        $sql = "CREATE TABLE if not exists `cliente` ( `id` int(11) NOT NULL AUTO_INCREMENT, `nome` varchar(250) NOT NULL, `rg` varchar(240) NOT NULL, `data_de_expedicao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00', `cpf` varchar(20) NOT NULL, `data_de_nascimento` datetime NOT NULL DEFAULT '0000-00-00 00:00:00', PRIMARY KEY (`id`), UNIQUE KEY `cpf` (`cpf`,`nome`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $wpdb->query($sql);
    }










    private static function Emails() {
        global $wpdb;
        $sql = " CREATE TABLE if not exists `email` ( `id` int(11) NOT NULL AUTO_INCREMENT, `email` varchar(60) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `email` (`email`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1; ";
        $wpdb->query($sql);
    }










    private static function ClientesEmails() {
        global $wpdb;
        $sql = "CREATE TABLE `clientes_email` ( `id` int(11) NOT NULL AUTO_INCREMENT, `cliente` int(11) NOT NULL, `email` int(11) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `cliente_email` (`cliente`,`email`), KEY `email_ceK` (`email`), CONSTRAINT `cliente_ceK` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`), CONSTRAINT `email_ceK` FOREIGN KEY (`email`) REFERENCES `email` (`id`) ON DELETE CASCADE ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $wpdb->query($sql);
    }










    private static function Telefone() {
        global $wpdb;
        $sql = " CREATE TABLE `telefone` ( `id` int(11) NOT NULL AUTO_INCREMENT, `telefone` varchar(20) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `telefone` (`telefone`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $wpdb->query($sql);
    }










    private static function ClienteTelefone() {
        global $wpdb;
        $sql = " CREATE TABLE `clientes_email` ( `id` int(11) NOT NULL AUTO_INCREMENT, `cliente` int(11) NOT NULL, `email` int(11) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `cliente_email` (`cliente`,`email`), KEY `email_ceK` (`email`), CONSTRAINT `cliente_ceK` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE, CONSTRAINT `email_ceK` FOREIGN KEY (`email`) REFERENCES `email` (`id`) ON DELETE CASCADE ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;";
        $wpdb->query($sql);
    }










}
