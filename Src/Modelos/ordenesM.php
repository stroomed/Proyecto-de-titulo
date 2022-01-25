<?php

require_once "ConexionBD.php";

class OrdenesM extends ConexionBD{

	static public function CrearOrdenM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_mesa, mesero) VALUES (:id_mesa, :mesero)");

		$pdo -> bindParam(":id_mesa", $datosC["id_mesa"], PDO::PARAM_INT);
		$pdo -> bindParam(":mesero", $datosC["mesero"], PDO::PARAM_STR);
//si pdo se ejecuta 
		if($pdo -> execute()){
			return true;
		}
//cerramos y vaciamos el pdo
		$pdo -> close();
		$pdo = null;

	}



	static public function VerOrdenM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}




	static public function AgregarPedidoOrdenM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_orden, comida, cantidad, p_unitario, p_total, extras, listo) VALUES (:id_orden, :comida, :cantidad, :p_unitario, :p_total, :extras, :listo)");
//enlazamos parametros
		$pdo -> bindParam(":id_orden", $datosC["id_orden"], PDO::PARAM_INT);
		$pdo -> bindParam(":comida", $datosC["comida"], PDO::PARAM_STR);
		$pdo -> bindParam(":cantidad", $datosC["cantidad"], PDO::PARAM_STR);
		$pdo -> bindParam(":p_unitario", $datosC["p_unitario"], PDO::PARAM_STR);
		$pdo -> bindParam(":p_total", $datosC["p_total"], PDO::PARAM_STR);
		$pdo -> bindParam(":extras", $datosC["extras"], PDO::PARAM_STR);
		$pdo -> bindParam(":listo", $datosC["listo"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	

	static public function VerPedidosOrdenM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id DESC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	static public function VerPedidosOrdenMprueba($tablaBD){

		$tablaBD2 = "ordenes";
		$tablaBD3 = "mesas";


		$pdo = ConexionBD::cBD()->prepare("SELECT $tablaBD.id, $tablaBD.comida, $tablaBD.id_orden, $tablaBD.cantidad, $tablaBD.extras, $tablaBD.listo , $tablaBD3.id,  $tablaBD3.numero FROM $tablaBD INNER JOIN $tablaBD2 ON $tablaBD.id_orden = $tablaBD2.id INNER JOIN $tablaBD3 ON $tablaBD2.id_mesa = $tablaBD3.id ORDER BY $tablaBD.id DESC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	static public function BorrarPedidoM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo ->close();
		$pdo = null;

	}
	static public function PrecioTotalM($tablaBD, $id_o){

		$pdo = ConexionBD::cBD()->prepare("SELECT SUM(p_total) FROM $tablaBD WHERE id_orden = $id_o");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function BorrarOrdenM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo ->close();
		$pdo = null;

	}


}