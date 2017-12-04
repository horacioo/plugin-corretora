<?php

namespace pl1;

class ClassePL1_Mysql extends ClassePL1_Mysql
 {

    public static $id;
    public static $array;
    public static $consulta;
    public static $obrigatorios = [];
    public static $mensagem;

    /**
     * 
      vou criar novo regstro
     *      */

    static protected function create($array = NULL) {
        global $wpdb;
        if (is_array($array)):

            $insert = "";
            $values = "";
            $chaves = array_keys($array);

            foreach ($chaves as $ch):
                if (is_array($array[$ch])) {
                    self::insertArray($array[$ch], $ch);
                    return;
                }
                if (in_array($ch, self::$obrigatorios)) {
                    if (empty($array[$ch])) {
                        self::$mensagem = $c . "está em branco";
                        return;
                    }
                }
                $insert .= "" . $ch . ",";
                $values .= "'" . $array[$ch] . "',";
            endforeach;

            $insert                       .= "*";
            $insert                       = str_replace(",*", "", $insert);
            $values                       .= "*";
            $values                       = str_replace(",*", "", $values);
            self::$consulta               = "insert into " . self::$tabela . "(" . $insert . ")values(" . $values . ")";
            $wpdb->query(self::$consulta);
            $id                           = $wpdb->insert_id;
            self::$array[self::$tabela] = $id;
          endif;
    }










    private static function insertArray($info = '', $campo = '') {
        foreach ($info as $i):
            self::create([$campo => $i]);
            echo "<br>" . self::$consulta;
        endforeach;
    }










    static function delete($array = NULL) {
        if (isset($array['id'])):
            $consulta       = "delete from `" . self::$tabela . "` where id =`" . $array['id'] . "`";
            self::$consulta = $consulta;
        //$wpdb->query(self::$consulta);
        endif;
    }










    static function update($array = NULL) {
        if (is_array($array) && isset($array['id'])):
            global $wpdb;
            $up     = "";
            $id     = " where id = `" . $array['id'] . "`";
            unset($array['id']);
            $chaves = array_keys($array);
            foreach ($chaves as $ch):
                $up .= "`" . $ch . "` = `" . $array[$ch] . "`, ";
            endforeach;
            $up             .= "*";
            $up             = str_replace(", *", "", $up);
            self::$consulta = "update `" . self::$tabela . "` set $up $id";
        //$wpdb->query(self::$consulta);
        endif;
    }










    static function all($query = NULL) {
        global $wpdb;
        if (is_null($query)) {
            $sel = "select * from `" . self::$tabela . "`";
        } else {
            $sel = $query;
        }
        self::$consulta = $sel;
        //$wpdb->query(self::$consulta);
    }










    static function Associate($tabelas = '') {
        global $wpdb;
    }










    private static function limpeza($info) {
        $info = trim($info);
        $info = strip_tags($info);
    }










}
