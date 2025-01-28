<?php
header('Content-Type: text/html; charset=utf-8');
class Database
{
    public static function connection()
    {
        $host = 'localhost:3306';
        $port = "3306";
        $user = 'root';
        $password = '';
        $database = 'claro_claro';

        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8",$user,$password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
    class DBController {
        /*Pruebas*/
       private $host = 'localhost:3306';
       private $user = 'root';
       private $password = '';
       private $database = 'claro_claro';
       private $conn;
    function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;

        mysqli_query($conn, "SET time_zone = 'America/Bogota'" );

        return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function executeUpdate($query) {
        $result = mysqli_query($this->conn,$query); 
		return $result;		
    }
    
    

}