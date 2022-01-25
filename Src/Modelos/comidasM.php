<?php

require_once "ConexionBD.php";

class ComidasM extends ConexionBD{

	static public function CrearComidaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (categoria, nombre, datos, precio) VALUES (:categoria, :nombre, :datos, :precio)");

		$pdo -> bindParam(":categoria", $datosC["categoria"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":datos", $datosC["datos"], PDO::PARAM_STR);
		$pdo -> bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}




	static public function VerComidasM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY categoria ASC");

			$pdo -> execute();

			return $pdo ->fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo ->close();
		$pdo = null;

	}




	static public function ActualizarComidaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET categoria = :categoria, nombre = :nombre, datos = :datos, precio = :precio WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":categoria", $datosC["categoria"], PDO::PARAM_STR);
		$pdo -> bindParam(":datos", $datosC["datos"], PDO::PARAM_STR);
		$pdo -> bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function BorrarComidaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	} 


}