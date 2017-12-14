<?php

namespace pl1;

class ClassePL1_Request
    {

    public static $tabela = "";
    public static $campos = "";
    private static $dados;
    public static $insert;
    private static $over;

    /*     * *

     * Essa função cria um array para inserir , precisando apenas indicar os valores e a tabela<br>
     * ex.:$x =  ent::Request([$dados,'clientes']);
     *      */

    public static function Request($x) {
        self::$insert = NULL;

        if (is_array($x)):
            $parametro   = self::$campos;
            $dados       = $x;
            $chaves      = array_keys($x);
            $indice      = -1;
            /*             * ***************************** */
            self::$dados = $x;
            /*             * **************************** */

            if (is_array(self::$campos)):
                foreach (self::$campos as $c):
                    if (in_array($c, $chaves)) {
                        self::$insert[$c] = $dados[$c];
                        unset($dados[$c]);
                }
                endforeach;
                /*                 * **************************** */
                foreach ($chaves as $d):
                    if (isset($dados[$d])) {
                        self::$over[$d] = $dados[$d];
                }
                endforeach;
            endif;

            /*             * **************************** */

            self::IntegridadeDadosNecessarios();
            return self::$insert;
        endif;
    }





    private static function IntegridadeDadosNecessarios() {
        if (self::$tabela == "cliente") {
            if (!isset(self::$dados['cpf'])) {
                echo"cpf vazio";
                self::$insert['cpf'] = substr(md5(time()), 0, 8) . "***";
            } else {
                self::$insert['cpf'] = str_replace(array(".", "-"), "", self::$insert['cpf']);
            }
        }
    }





    }
