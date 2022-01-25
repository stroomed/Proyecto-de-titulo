<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{

	static public function IniciarSesionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}




	static public function VerPerfilM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = $id");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}




	static public function EditarPerfilM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, apellido = :apellido, nombre = :nombre WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}




	static public function VerUsuariosM($tablaBD, $columna, $valor){

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




	static public function CrearUsuariosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (apellido, nombre, usuario, clave, rol) VALUES (:apellido, :nombre, :usuario, :clave, :rol)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}





	static public function EditarUsuariosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, apellido = :apellido, nombre = :nombre, rol = :rol WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}




	static public function BorrarUsuariosM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


}