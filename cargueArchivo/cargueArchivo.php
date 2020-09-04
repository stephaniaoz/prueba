<?php
require "config/Connection.php";
include "models/ClassCargueArchivo.php";

	$nameFile = "cargueEjemplo.csv";
	$badFile = true;
	$connection = new Connection();
	$countOk = 0;
	
	foreach($argv as $file){
		//explode("/",$nameFile);
		/*Se valida que el archivo tenga las características del nombre y la extensión en la misma carpeta.*/
		if($file == $nameFile){
			$badFile = false;
			$rows = 1;
			
			$read = fopen($file, "r");
			if (($read) !== false) {
				while (($data = fgetcsv($read, 1000, ";")) !== false) {
					$columns = count($data);
					
					if($columns == 5){
						/*Se validan datos obligatorios*/
						if(trim($data[0]) == '' || trim($data[1]) == '' || trim($data[2]) == '' || trim($data[4]) == ''){
							echo "Existen datos nulos en la fila ".$rows.".\n";
							$rows++;
							continue;
						}else{
							/*Se setea objeto para insertar en la base de datos.*/
							$obj = new ClassCargueArchivo();
							$obj->setIdentification($data[0]);
							$obj->setName($data[1]);
							$obj->setSurname($data[2]);
							$obj->setPhone($data[3]);
							$obj->setEmail($data[4]);
							$insert = $obj->saveData($connection);
							
							if($insert == 1){
								$countOk += 1;
							}
						}
						
					}else{
						echo "Fila (".$rows."). El archivo debe tener 5 columnas por cada fila y está llevando ".$columns.".\n";
					}
					$rows++;
				}
			}
			//$connection->getData();
			echo "Se insertaron ".$countOk." registros;";
			return;
		}
	}
	
	if($badFile){
		echo "Ocurrió una inconsistencia con el archivo, por favor revisar que no tenga encabezados, tenga el nombre y extensión correspondiente: 'cargueEjemplo.csv'.";
	}

?>