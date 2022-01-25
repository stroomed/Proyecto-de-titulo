<?php

class CocinaC{

	public function CrearOrdenC(){
//Consultamos si la variabel post viene con datos o vacia..
		if(isset($_POST["id_mesa"])){

			$tablaBD = "ordenes";

			$n_mesa = $_POST["n_mesa"];

			$datosC = array("id_mesa"=>$_POST["id_mesa"], "mesero"=>$_POST["mesero"]);

			$resultado = OrdenesM::CrearOrdenM($tablaBD, $datosC);
//si es verdadero salta la alerta
			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Orden ha sido Creada Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/restaurante/Mesa/'.$n_mesa.'";
								
							}

						})


				
				</script>';

			}

		}

	}


// creamos controlador para ver ordenes...
	static public function VerOrdenC($columna, $valor){
//se crea la varuable de ordenes que igual a la tabla de bd
		$tablaBD = "ordenes";

		$resultado = OrdenesM::VerOrdenM($tablaBD, $columna, $valor);
//retorna lo que traiga la variable resultado
		return $resultado;

	}



	public function AgregarPedidoOrdenC(){

		if(isset($_POST["comida"])){

			$tablaBD = "o_pedidos";

			$n_mesa = $_POST["n_mesa"];

			$id_orden = $_POST["id_o"];

			$datosC = array("comida"=>$_POST["comida"], "id_orden"=>$_POST["id_o"], "cantidad"=>$_POST["cantidad"], "p_unitario"=>$_POST["precio"], "p_total"=>$_POST["precioF"], "extras"=>$_POST["extras"]);

			$resultado = OrdenesM::AgregarPedidoOrdenM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/restaurante/Orden/'.$n_mesa.'/'.$id_orden.'";
				</script>';

			}

		}

	}



	public function VerPedidosOrdenC(){

		$tablaBD = "o_pedidos";

		$resultado = OrdenesM::VerPedidosOrdenM($tablaBD);

		return $resultado;

	}



	public function BorrarPedidoC(){

		if(isset($_GET["Pid"])){

			$tablaBD = "o_pedidos";

			$id = $_GET["Pid"];

			$MN = $_GET["MN"];

			$Oid = $_GET["Oid"];

			$resultado = OrdenesM::BorrarPedidoM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/restaurante/Orden/'.$MN.'/'.$Oid.'";
				</script>';

			}


		}

	}



	static public function PrecioTotalC($id_o){

		$tablaBD = "o_pedidos";

		$resultado = OrdenesM::PrecioTotalM($tablaBD, $id_o);

		return $resultado;

	} 



	public function BorrarOrdenC(){

		if(isset($_POST["id_orden"])){

			$tablaBD = "ordenes";

			$id = $_POST["id_orden"];

			$resultado = OrdenesM::BorrarOrdenM($tablaBD, $id);

		}

	}


}