<?php

class Connection{
	
	private $conn = null;
	private $rs = null;
	/** Configuración de la conexión con PDO */
	private $host = "localhost";
	private $nameBd = "cargue";
	private $user = "root";
	private $pass = "";
	private $or;
	private $table = "data";
	
	function __construct(){
		try{
			$this->or = "mysql:host=".$this->host.";dbname=".$this->nameBd;
			$this->conn = new PDO($this->or, $this->user, $this->pass);			
		}catch(PDOException $e){
			echo "Error: ". $e->getMessage();
		}
	}
	
	public function getConn(){
		return $this->conn;
	}
	
	public function insertData(){
		/*Se define consulta para que sean pasados los parametros y poder realizar la ejecución desde donde se llame*/
		$sql = "INSERT INTO ".$this->table." (identification_card, name, surname, phone, email) VALUES (?, ?, ?, ?, ?)";
		$stm = $this->conn->prepare($sql);
		return $stm;
	}
	
	public function getData(){
		/*Consulta los datos que hay en la bd*/
		$rs = $this->conn->query("SELECT * FROM data;");
		
		foreach($rs as $row){
			print_r($row);
			echo "\n";
		}
	}	
	
}
	
	
?>