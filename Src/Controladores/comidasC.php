<?php

class ComidasC{

	public function CrearComidaC(){

		if(isset($_POST["nombre"])){

			$tablaBD = "comidas";

			$datosC = array("categoria"=>$_POST["categoria"], "nombre"=>$_POST["nombre"], "datos"=>$_POST["datos"], "precio"=>$_POST["precio"]);

			$resultado = ComidasM::CrearComidaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Comida ha sido Creada Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Comidas";
								
							}

						})


				
				</script>';

			}

		}

	}




	static public function VerComidasC($columna, $valor){

		$tablaBD = "comidas";

		$resultado = ComidasM::VerComidasM($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function ActualizarComidaC(){

		if(isset($_POST["idE"])){

			$tablaBD = "comidas";

			$datosC = array("id"=>$_POST["idE"], "nombre"=>$_POST["nombreE"], "datos"=>$_POST["datosE"], "categoria"=>$_POST["categoriaE"], "precio"=>$_POST["precioE"]);

			$resultado = ComidasM::ActualizarComidaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Comida ha sido Edita Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/restaurante/Comidas";
								
							}

						})


				
				</script>';

			}

		}

	}




	public function BorrarComidaC(){

		if(isset($_GET["Coid"])){

			$tablaBD = "comidas";

			$id = $_GET["Coid"];

			$resultado = ComidasM::BorrarComidaM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "Comidas";
				</script>';

			}

		}

	}


}