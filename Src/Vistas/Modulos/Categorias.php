<?php

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "Inicio";
	</script>';

	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestor de Categorías</h1>

	</section>

	<section class="content">
		
		<div class="box box-primary">

			<div class="box-header with-border">
				
				<form method="post">
					
					<div class="col-md-6 col-xs-12">
						
						<input type="text" class="form-control" name="categoria" required="">	

					</div>

					<button class="btn btn-primary" type="submit">Crear Categoría</button>

					<?php

					$crear = new CategoriasC();
					$crear -> CrearCategoriaC();

					?>

				</form>

			</div>
			
			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped">
					
					<thead>
						<tr>
							
							<th>Categoría</th>
							<th></th>

						</tr>
					</thead>

					<tbody>
						
						<?php

						$columna = null;
						$valor = null;

						$resultado = CategoriasC::VerCategoriasC($columna, $valor);

						foreach ($resultado as $key => $value) {
							
							echo '<tr>

								<td>'.$value["categoria"].'</td>

								<td>

									<button class="btn btn-success EditarCategoria" data-toggle="modal" data-target="#EditarCategoria" Cid="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

									<button class="btn btn-danger BorrarCategoria" Cid="'.$value["id"].'"><i class="fa fa-trash"></i></button>

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


<div id="EditarCategoria" class="modal fade">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="form-group">
						
						<h2>Categoría:</h2>

						<input type="text" class="input-lg form-control" id="categoria" name="categoriaE" required>

						<input type="hidden" id="id" name="idE">

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$editar = new CategoriasC();
				$editar -> EditarCategoriaC();

				?>

			</form>

		</div>

	</div>

</div>



<?php

$borrar = new CategoriasC();
$borrar -> BorrarCategoriaC();

?>