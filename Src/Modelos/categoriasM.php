<?php

require_once "ConexionBD.php";

class CategoriasM extends ConexionBD{

	static public function CrearCategoriaM($tablaBD, $categoria){
		//coencta a la funcion bd

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (categoria) VALUES (:categoria)");

		$pdo -> bindParam(":categoria", $categoria, PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function VerCategoriasM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}




	static public function EditarCategoriaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET categoria = :categoria WHERE id = :id");

		$pdo -> bindParam(":categoria", $datosC["categoria"], PDO::PARAM_STR);
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}




	static public function BorrarCategoriaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



}