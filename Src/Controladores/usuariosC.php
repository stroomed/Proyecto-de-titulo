<?php

class UsuariosC{

	public function IniciarSesionC(){

		if(isset($_POST["usuario"])){

			$tablaBD = "usuarios";

			$datosC = array("usuario" => $_POST["usuario"], "clave" => $_POST["clave"]);

			$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

			if($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]){

				$_SESSION["Ingresar"] = true;

				$_SESSION["id"] = $resultado["id"];
				$_SESSION["usuario"] = $resultado["usuario"];
				$_SESSION["usuario"] = $resultado["usuario"];
				$_SESSION["clave"] = $resultado["clave"];

				$_SESSION["nombre"] = $resultado["nombre"];
				$_SESSION["apellido"] = $resultado["apellido"];

				$_SESSION["rol"] = $resultado["rol"];

				
				switch($_SESSION["rol"]){
					case "Administrador":
						echo '<script>
						window.location = "Inicio";
						</script>';
						break;
					case "Mesero":
						echo '<script>
						window.location = "Inicio";
						</script>';
						break;
					case "Cocinero":
						echo '<script>
						window.location = "Cocina";
						</script>';
						break;
				}
				
				
			

				

			}else{

				echo '<br><div class="alert alert-danger">Error al Ingresar</div>';

			}

		}

	}



	public function VerPerfilC(){

		$tablaBD = "usuarios";

		$id = $_SESSION["id"];

		$resultado = UsuariosM::VerPerfilM($tablaBD, $id);

		echo '<div class="col-md-6 col-xs-12">
							
				<h2>Nombre:</h2>
				<input type="text" name="nombre" class="input-lg" value="'.$resultado["nombre"].'">
			
				<input type="hidden" name="id" class="input-lg" value="'.$resultado["id"].'">
<h2>Apellido:</h2>
					<input type="text" name="apellido" class="input-lg" value="'.$resultado["apellido"].'">

			</div>

			<div class="col-md-6 col-xs-12">
				
				<h2>Usuario:</h2>
				<input type="text" name="usuario" class="input-lg" value="'.$resultado["usuario"].'">

				<h2>Contraseña:</h2>
				<input type="text" name="clave" class="input-lg" value="'.$resultado["clave"].'">

				<br><br>

				<button type="submit" class="btn btn-success input-lg">Guardar Cambios</button>

			</div>';

	}



	public function EditarPerfilC(){

		if(isset($_POST["id"])){

			$tablaBD = "usuarios";

			$datosC = array("id" => $_POST["id"], "apellido" => $_POST["apellido"], "nombre" => $_POST["nombre"], "usuario" => $_POST["usuario"], "clave" => $_POST["clave"]);

			$resultado = UsuariosM::EditarPerfilM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "Su Perfil ha sido Editado Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Perfil";
								
							}

						})


				
				</script>';

			}

		}

	}



	static public function VerUsuariosC($columna, $valor){

		$tablaBD = "usuarios";

		$resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

		return $resultado;

	}




	public function CrearUsuariosC(){

		if(isset($_POST["apellido"])){

			$tablaBD = "usuarios";

			$datosC = array("apellido"=>$_POST["apellido"], "nombre" => $_POST["nombre"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rol"]);

			$resultado = UsuariosM::CrearUsuariosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "El Usuario ha sido Creado Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Usuarios";
								
							}

						})


				
				</script>';

			}

		}

	} 





	public function EditarUsuariosC(){

		if(isset($_POST["idE"])){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["idE"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"], "rol"=>$_POST["rolE"]);

			$resultado = UsuariosM::EditarUsuariosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "El Usuario ha sido Editado Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Usuarios";
								
							}

						})


				
				</script>';

			}

		}

	}




	public function BorrarUsuariosC(){

		if(isset($_GET["Uid"])){

			$tablaBD = "usuarios";

			$id = $_GET["Uid"];

			$resultado = UsuariosM::BorrarUsuariosM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "Usuarios";
				</script>';

			}

		}

	}



}