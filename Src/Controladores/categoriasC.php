<?php

class CategoriasC{

	public function CrearCategoriaC(){
//viene con info?
		if(isset($_POST["categoria"])){

			$tablaBD = "categorias";
//creamos nueva variable
			$categoria = $_POST["categoria"];
//conecta a categoria
			$resultado = CategoriasM::CrearCategoriaM($tablaBD, $categoria);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Categoría ha sido Creada Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Categorias";
								
							}

						})


				
				</script>';

			}

		}

	}



	static public function VerCategoriasC($columna, $valor){

		$tablaBD = "categorias";

		$resultado = CategoriasM::VerCategoriasM($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function EditarCategoriaC(){

		if(isset($_POST["idE"])){

			$tablaBD = "categorias";

			$datosC = array("id"=>$_POST["idE"], "categoria"=>$_POST["categoriaE"]);

			$resultado = CategoriasM::EditarCategoriaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Categoría ha sido Editada Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "Categorias";
								
							}

						})


				
				</script>';

			}

		}

	}




	public function BorrarCategoriaC(){

		if(isset($_GET["Cid"])){

			$tablaBD = "categorias";

			$id = $_GET["Cid"];

			$resultado = CategoriasM::BorrarCategoriaM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "Categorias";
				</script>';

			}

		}

	}


}