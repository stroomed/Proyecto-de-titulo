<?php

require_once "../Controladores/comidasC.php";
require_once "../Modelos/comidasM.php";

class ComidasA{

	public $Coid;

	public function SeleccionarComida(){

		$columna = "nombre";
		$valor = $this->Coid;

		$resultado = ComidasC::VerComidasC($columna, $valor);

		echo json_encode($resultado);

	}

}
if(isset($_POST["Coid"])){

	$sc = new ComidasA();
	$sc -> Coid = $_POST["Coid"];
	$sc -> SeleccionarComida();

}