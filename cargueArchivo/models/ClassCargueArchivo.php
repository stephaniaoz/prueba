<?php 


class ClassCargueArchivo{
	
	private $identification;
	private $name;
	private $surname;
	private $phone;
	private $email;
	
	function __construct(){
	}
	
	public function setIdentification($value){
		$this->identification = $value;
	}
	
	public function setName($value){
		$this->name = $value;
	}
	
	public function setSurname($value){
		$this->surname = $value;
	}
	
	public function setPhone($value){
		$this->phone = $value;
	}
	
	public function setEmail($value){
		$this->email = $value;
	}
	
	public function getIdentification(){
		return $this->identification;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getISurname(){
		return $this->surname;
	}
	
	public function getPhone(){
		return $this->phone;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function saveData($connection=null){
		
		if($connection){
			try{
				$stm = $connection->insertData();
				$stm->execute([$this->identification, $this->name, $this->surname, $this->phone, $this->email]);
				if($stm){
					echo "Se insertó con exito el dato con identificación: ".$this->identification."\n";
					return 1;
				}			
				
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}			
		}
		
	}
	
}

?>