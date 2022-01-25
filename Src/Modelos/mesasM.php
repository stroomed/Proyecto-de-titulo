<?php

require_once "ConexionBD.php";

class MesasM extends ConexionBD{

	static public function CrearMesaM($tablaBD, $datosC){
//* Insertamos en la base de datos*//
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (numero, c_personas, estado) VALUES (:numero, :c_personas, :estado)");

		$pdo -> bindParam(":numero", $datosC["numero"], PDO::PARAM_INT);
		$pdo -> bindParam(":c_personas", $datosC["c_personas"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function VerMesasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY numero ASC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	static public function VerMesas2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo ->bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function BorrarMesaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo->close();
		$pdo = null;

	}



	static public function EstadoMesaM($tablaBD, $datosC){
// actualiza lo que traiga la variable datos estado
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo->close();
		$pdo = null;

	}




	static public function EstadoMesaPM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


}