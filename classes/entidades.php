<?php

namespace classes\entidades;

class entidades {

    static $cliente          = ['nome', 'rg', 'data_de_expedicao', 'cpf', 'data_de_nascimento'];
    static $email            = ['email'];
    static $telefone         = ['telefone'];
    static $cliente_email    = ['cliente', 'email'];
    static $cliente_telefone = ['cliente', 'telefone'];
    static $insert;
    static $over;
    static $tabela;

    /*     * *

     * Essa função cria um array para inserir , precisando apenas indicar os valores e a tabela<br>
     * ex.:$x =  ent::Request([$dados,'clientes']);
     *      */

    public static function Request($x) {
        if (is_array($x)):
            $parametro    = $x[1];
            $dados        = $x[0];
            $chaves       = array_keys($dados);
            $indice       = -1;
            /*             * ***************************** */
            self::$tabela = $parametro;
            /*             * **************************** */
            foreach (self::$cliente as $c):
                if (in_array($c, $chaves)) {
                    self::$insert[$c] = $dados[$c];
                    unset($dados[$c]);
                }
            endforeach;
            /*             * **************************** */
            foreach ($chaves as $d):
                if (isset($dados[$d])) {
                    self::$over[$d] = $dados[$d];
                }
            endforeach;
        /*         * **************************** */

        endif;
    }










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
        $sql = " CREATE TABLE `cliente_telefone` ( `id` int(11) NOT NULL AUTO_INCREMENT, `cliente` int(11) NOT NULL, `telefone` int(11) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `clienteTelefone` (`cliente`,`telefone`), CONSTRAINT `cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE, CONSTRAINT `telefone` FOREIGN KEY (`cliente`) REFERENCES `telefone` (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        $wpdb->query($sql);
    }










}
