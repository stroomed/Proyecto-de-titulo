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
		
		<h1>Gestor de Usuarios</h1>

	</section>

	<section class="content">
		
		<div class="box">

			<div class="box-header with-border">
				
				<button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuarios">Crear Nuevo Usuario</button>

			</div>
			
			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped">
					
					<thead>
						<tr>
							
							<th>Apellido</th>
							<th>Nombres</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Rol</th>
							<th></th>

						</tr>
					</thead>

					<tbody>
						
						<?php

						$columna = null;
						$valor = null;

						$resultado = UsuariosC::VerUsuariosC($columna, $valor);

						foreach ($resultado as $key => $value) {
							
							echo '<tr>

									<td>'.$value["apellido"].'</td>
									<td>'.$value["nombre"].'</td>
									<td>'.$value["usuario"].'</td>
									<td>'.$value["clave"].'</td>
									<td>'.$value["rol"].'</td>

									<td>

										<button class="btn btn-success EditarUsuarios" data-toggle="modal" data-target="#EditarUsuarios" Uid="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

										<button class="btn btn-danger BorrarUsuario" Uid="'.$value["id"].'"><i class="fa fa-trash"></i></button>

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





<div id="CrearUsuarios" class="modal fade">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Tipo de Usuario:</h2>

							<select class="form-control input-lg" name="rol" required="">
								
								<option>Seleccionar...</option>

								<option value="Administrador">Administrador</option>
								<option value="Mesero">Mesero</option>
								<option value="Cocinero">Cocinero</option>
								<option value="General">General</option>

							</select>

						</div>

						<div class="form-group">
							
							<h2>Apellido:</h2>
							<input type="text" class="form-control input-lg" name="apellido" required="">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>
							<input type="text" class="form-control input-lg" name="nombre" required="">

						</div>

						<div class="form-group">
							
							<h2>Usuario:</h2>
							<input type="text" class="form-control input-lg" name="usuario" required="">

						</div>

						<div class="form-group">
							
							<h2>Contraseña:</h2>
							<input type="text" class="form-control input-lg" name="clave" required="">

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button class="btn btn-primary" type="submit">Crear</button>

					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				$crear = new UsuariosC();
				$crear -> CrearUsuariosC();

				?>

			</form>

		</div>

	</div>

</div>



<div id="EditarUsuarios" class="modal fade">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Tipo de Usuario:</h2>

							<select class="form-control input-lg" id="rol" name="rolE" required="">
								
								<option>Seleccionar...</option>

								<option value="Administrador">Administrador</option>
								<option value="Mesero">Mesero</option>
								<option value="Cocinero">Cocinero</option>
								<option value="General">General</option>

							</select>

						</div>

						<div class="form-group">
							
							<h2>Apellido:</h2>
							<input type="text" class="form-control input-lg" id="apellido" name="apellidoE" required="">
							<input type="hidden" class="form-control input-lg" id="id" name="idE" required="">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>
							<input type="text" class="form-control input-lg" id="nombre" name="nombreE" required="">

						</div>

						<div class="form-group">
							
							<h2>Usuario:</h2>
							<input type="text" class="form-control input-lg" id="usuario" name="usuarioE" required="">

						</div>

						<div class="form-group">
							
							<h2>Contraseña:</h2>
							<input type="text" class="form-control input-lg" id="clave" name="claveE" required="">

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button class="btn btn-success" type="submit">Guardar Cambios</button>

					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				$editar = new UsuariosC();
				$editar -> EditarUsuariosC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$borrar = new UsuariosC();
$borrar -> BorrarUsuariosC();

?>