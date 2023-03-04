<?php

//Importado o modulo  do connection.php
require_once "connection.php";

 class ConnectarBase{
    private static $instancia;
    public static function getConnection(){
       //Conectando a base de dados 
        if(!isset(self::$instancia)){
            try {
                self::$instancia = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo $e->getMessage();

            }
        }

        return self::$instancia;
    }

   public static function prepare($sql){

        return self::getConnection()->prepare($sql);

    }
     
 }
 

?>