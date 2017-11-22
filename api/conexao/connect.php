<?php
class Conexao{

    private static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            // self::$instance = new PDO('mysql:host=localhost;dbname=prodonto','root','',
            // array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));            

            self::$instance = new PDO('mysql:host=mysql-prodonto.chiogknrcj4p.us-east-2.rds.amazonaws.com;dbname=prodonto','uninove_admin','$UN1N0V3R0B1NH0',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
}