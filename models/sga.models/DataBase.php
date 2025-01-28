<?php
class DataBase
{
    //     public static function conn(){
    //         $hostname = "sga.mysql.database.azure.com";
    //         $port = "3306";
    //         $database = "sga";
    //         $username = "zac";
    //         $password = "SGA2024.";
    //         $options = array(
    //             PDO::MYSQL_ATTR_SSL_CA => 'assets/DigiCertGlobalRootCA.crt.pem'
    //         );

    //         $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8", $username, $password, $options);
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $pdo;
    //     }
    // }
    public static function conn()
    {
        $hostname = "localhost:3306";
        $port = "3306";
        $database = "sga";
        $username = "root";
        $password = "";

        $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
