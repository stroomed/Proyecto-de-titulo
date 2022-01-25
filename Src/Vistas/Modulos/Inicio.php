<?php

if($_SESSION["rol"] == "Cocinero"){

	echo '<script>

	window.location = "Inicio";
	</script>';

	return;

}

?>


<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Inicio</h1>

	</section>

	<section class="content">

		<button class="btn btn-primary" data-toggle="modal" data-target="#CrearMesa">Crear Mesa</button>

		<br><br>
		
		<div class="row M">

			<?php

			$resultado = MesasC::VerMesasC();

			foreach ($resultado as $key => $value) {
				
				if($value["estado"] == "libre"){

					echo '<div class="col-md-3 col-xs-6 bg-success" style="margin:2px">';

				}else{

					echo '<div class="col-md-3 col-xs-6 bg-danger" style="margin:2px">';

				}

				echo '<h2>Mesa N°: '.$value["numero"].' <button class="btn btn-danger pull-right BorrarMesa" Mid="'.$value["id"].'"><i class="fa fa-trash"></i></button></h2>

				<h3>Cantidad de Personas: '.$value["c_personas"].'</h3>';

				if($value["estado"] == "libre"){

					echo '<h3>Estado: <button class="btn btn-success">Libre</button></h3>';

				}else{

					echo '<h3>Estado: <button class="btn btn-danger">Ocupado</button></h3>';

				}

				echo '<a href="http://localhost/restauranteTest/Mesa/'.$value["numero"].'">
					
					<button class="btn btn-primary">Administrar</button>

				</a>

			</div>';

				

			}

			?>
			

		</div>

	</section>

</div>




<div class="modal fade" id="CrearMesa">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Número de la Mesa:</h2>

							<input type="number" class="form-control input-lg" name="numero" required="">

						</div>

						<div class="form-group">
							
							<h2>Cantidad de Personas:</h2>

							<input type="number" class="form-control input-lg" name="c_personas" required="">

							<input type="hidden" class="form-control input-lg" name="estado" value="libre" required="">

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear Mesa</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

				</div>

				<?php

				$crear = new MesasC();
				$crear -> CrearMesaC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$Borrar = new MesasC();
$Borrar -> BorrarMesaC();

?>