<?php

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "Inicio";
	</script>';

	return;

}

$url = explode("/", $_GET["url"]);

?>

<div class="content-wrapper">
	
	<section class="content-header">

		<?php

		$columna = "id";
		$valor = $url[1];

		$comida = ComidasC::VerComidasC($columna, $valor);

		echo '<h1>Editar La Comida: '.$comida["nombre"].'</h1>';

		?>
		
		

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<form method="post">
					
					<div class="col-md-6 col-xs-12">

						<?php

						echo '<h2>Nombre:</h2>
								<input type="text" name="nombreE" class="input-lg" value="'.$comida["nombre"].'" required="">
								<input type="hidden" name="idE" class="input-lg" value="'.$comida["id"].'" required="">

								<h2>Datos:</h2>
								<textarea name="datosE" style="width: 250px; height: 50px" required="">
									
									'.$comida["datos"].'

							</textarea>
						
						

					</div>


					<div class="col-md-6 col-xs-12">
						
						<h2>Categoria Actual: '.$comida["categoria"].'</h2>

						<select class="input-lg" name="categoriaE" required="">
								
							<option value="'.$comida["categoria"].'">Seleccionar...</option>';

						?>

							<?php

							$columna = null;
							$valor = null;

							$categorias = CategoriasC::VerCategoriasC($columna, $valor);

							foreach ($categorias as $key => $value) {
								
								echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';

							}

							?>

						</select>	

						<?php

						echo '<h2>Precio:</h2>
						<input type="text" name="precioE" class="input-lg" value="'.$comida["precio"].'" required="">';

						?>

						
						<br><br>

						<button class="btn btn-success" type="submit">Guardar Cambios</button>

						<?php

						$actualizar = new ComidasC();
						$actualizar -> ActualizarComidaC();

						?>

					</div>

				</form>
				
			</div>

		</div>

	</section>

</div>