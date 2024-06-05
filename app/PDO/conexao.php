<?php


//Singleton
class Conexao {
    private static $instance;

    public static function getConn(){
        //Verificação se já existe uma instância, caso exista ele reaproveita
        if (!isset(self::$instance)){
            self::$instance = new \PDO('pgsql:host=localhost;port=5432;dbname=pi_apuama;','postgres', 'isaac020492.');
        }
    
        return self::$instance;
    }
}

class DBController {
	private $host = "localhost";
	private $user = "postgres";
	private $password = "isaac020492.";
	private $database = "pi_apuama";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
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
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>
