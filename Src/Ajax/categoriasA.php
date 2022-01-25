<?php

require_once "../Controladores/categoriasC.php";
require_once "../Modelos/categoriasM.php";

class CategoriasA{

	public $Cid;

	public function EditarCA(){

		$columna = "id";
		$valor = $this->Cid;

		$resultado = CategoriasC::VerCategoriasC($columna, $valor);

		echo json_encode($resultado);

	}

}


if(isset($_POST["Cid"])){

	$categoria = new CategoriasA();
	$categoria -> Cid = $_POST["Cid"];
	$categoria -> EditarCA();

}