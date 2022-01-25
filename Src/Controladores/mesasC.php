<?php

class MesasC{

	public function CrearMesaC(){
		/*La variable post viene con información?*/

		if(isset($_POST["numero"])){
			/* Si se cumple creamos la variable mesa*/

			$tablaBD = "mesas";
			/*Creamos la variable datos**/

			$datosC = array("numero"=>$_POST["numero"], "c_personas"=>$_POST["c_personas"], "estado"=>$_POST["estado"]);

			$resultado = MesasM::CrearMesaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Mesa ha sido Creada Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Inicio";
								
							}

						})


				
				</script>';

			}

		}

	}



	public function VerMesasC(){

		$tablaBD = "mesas";

		$resultado = MesasM::VerMesasM($tablaBD);

		return $resultado;

	}


	static public function VerMesas2C($columna, $valor){

		$tablaBD = "mesas";

		$resultado = MesasM::VerMesas2M($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function BorrarMesaC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "mesas";

			$id = $_GET["Mid"];

			$resultado = MesasM::BorrarMesaM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "Inicio";
				</script>';

			}

		}

	}




	public function EstadoMesaC(){

		if(isset($_POST["id_mesa"])){

			$tablaBD = "mesas";

			$datosC = array("id"=>$_POST["id_mesa"], "estado"=>"ocupado");

			$resultado = MesasM::EstadoMesaM($tablaBD, $datosC);

		}

	}



	public function EstadoMesaPC(){

		if(isset($_POST["id_mesa"])){

			$tablaBD = "mesas";

			$datosC = array("id"=>$_POST["id_mesa"], "estado"=>"libre");

			$resultado = MesasM::EstadoMesaPM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Orden ha sido Pagada",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/restauranteTest/Inicio";
								
							}

						})


				
				</script>';

			}

		}

	}



}