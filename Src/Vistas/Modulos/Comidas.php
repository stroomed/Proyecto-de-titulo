<?php

if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Mesero"){

	echo '<script>

	window.location = "Inicio";
	</script>';

	return;

}


?>


<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestor de Comidas</h1>

		<br>

		<button class="btn btn-primary" data-toggle="modal" data-target="#CrearComida">Crear Nueva Comida</button>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped">
					
					<thead>
						<tr>
							
							<th>Categoría</th>
							<th>Nombre</th>
							<th>Datos</th>
							<th>Precio</th>

							<th></th>

						</tr>
					</thead>

					<tbody>
						
						<?php

						$columna = null;
						$valor = null;

						$resultado = ComidasC::VerComidasC($columna, $valor);

						foreach ($resultado as $key => $value) {
							
							echo '<tr>

									<td>'.$value["categoria"].'</td>
									<td>'.$value["nombre"].'</td>
									<td>'.$value["datos"].'</td>
									<td>$ '.$value["precio"].'</td>

									<td>

										<a href="Editar-Comida/'.$value["id"].'">
											<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
										</a>
										

										<button class="btn btn-danger BorrarComida" Coid="'.$value["id"].'"><i class="fa fa-trash"></i></button>

									</td>

								</tr>';

						}

						?>

					</tbody>

				</table>
				
			</div>

		</div>

	</section>

</div>





<div class="modal fade" id="CrearComida">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="fomr-group">
							
							<h2>Categoría:</h2>
							
							<select class="form-control input-lg" name="categoria" required="">
								
								<option>Seleccionar...</option>

								<?php

								$columna = null;
								$valor = null;

								$categorias = CategoriasC::VerCategoriasC($columna, $valor);

								foreach ($categorias as $key => $value) {
									
									echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';

								}

								?>

							</select>		

						</div>

						<div class="fomr-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="nombre" required="">

						</div>	

						<div class="fomr-group">
							
							<h2>Datos:</h2>

							<textarea class="form-control" name="datos" required="">
								


							</textarea>

						</div>	

						<div class="fomr-group">
							
							<h2>Precio:</h2>

							<input type="text" class="form-control input-lg" name="precio" required="">

						</div>	


					</div>	

				</div>


				<div class="modal-footer">
					
					<button class="btn btn-primary" type="submit">Crear</button>

					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$crear = new ComidasC();
				$crear -> CrearComidaC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$Borrar = new ComidasC();
$Borrar -> BorrarComidaC();

?>