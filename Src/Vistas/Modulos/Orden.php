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
		<a href="http://localhost/RestauranteTest/Inicio">
			<button class="btn btn-primary">Volver a Mesas</button>
		</a>
		<br><br>
		<?php  
			$exp = explode("/", $_GET["url"]);
			if(isset($exp[1])){
				$columna = "numero";
				$valor = $exp[1];
				$mesa = MesasC::VerMesas2C($columna, $valor);
				$columna = "id";
				$valor = $exp[2];
				$orden = OrdenesC::VerOrdenC($columna, $valor);
				echo '<h1>La Mesa N°: '.$mesa["numero"].' está Ocupada.</h1>
					<h2>Estado Actual: <button class="btn btn-danger">Ocupado</button></h2>
					<h2>Mesero/a: '.$orden["mesero"].'</h2>';
				if(isset($exp[2])){
					$id_o = $exp[2];
					$Total = OrdenesC::PrecioTotalC($id_o);
					$t = implode(" ", $Total);
					$final = explode(" ", $t);
					echo '<h2>Total: $ '.$final[0].'</h2>';
				}
			}
		?>
		<?php
			$total = $final[0];
			$fecha = date('yy-m-d');
			$conn = new PDO("mysql:host=localhost;dbname=restaurante","root","");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($total){
				$sql = "INSERT INTO graficas (total_o, fecha) VALUES ($total, '$fecha')";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			}
		?>
		<form method="post">
			<?php
				echo '<input type="hidden" name="id_mesa" value="'.$mesa["id"].'">
					<input type="hidden" name="id_orden" value="'.$exp[2].'">';
			?>
			<button type="submit" class="btn btn-success pull-right btn-lg">Liberar</button>
			<?php
				$estadoMesa = new MesasC();
				$estadoMesa -> EstadoMesaPC();
				$BorrarOrden = new OrdenesC();
				$BorrarOrden -> BorrarOrdenC();
			?>
		</form>
		<br><br>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<h2>Pedidos:</h2>
				<button class="btn btn-primary" data-toggle="modal" data-target="#AgregarPedido">Agregar Pedido</button>
				<?php
					$o_pedidos = OrdenesC::VerPedidosOrdenC();
					foreach ($o_pedidos as $key => $value){
						$conn = new PDO("mysql:host=localhost;dbname=restaurante","root","");
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						if(isset($_POST['modify'.$value[0].'']))
						{
							$sql = "UPDATE o_pedidos SET listo = 'Servido' WHERE id=$value[0]";
							$stmt = $conn->prepare($sql);
							$stmt->execute();
						}
						if(isset($exp[2])){
							if($value["id_orden"] == $exp[2]){
							echo '<div class="row Pedido">
									<div class="col-md-3">	
										<h2>Comida o Bebida</h2>
										<input type="text" class="form-control" readonly value="'.$value["comida"].'">
									</div>
									<div class="col-md-1">
										<h2>Cantidad</h2>
										<input type="number" class="form-control" readonly value="'.$value["cantidad"].'">
									</div>
									<div class="col-md-2">
										<h2>Precio Final</h2>
										<input type="text" class="form-control" readonly value="$ '.$value["p_total"].'">
									</div>
									<div class="col-md-3">
										<h2>Extras</h2>
										<input type="text" class="form-control" readonly value="'.$value["extras"].'">
									</div>
									<div class="col-md-1">
										<h2>Estado</h2>
										<input type="text" class="form-control" readonly value="'.$value["listo"].'">
									</div>
									<div class="col-md-1">
									<h2>&nbsp;</h2>
									<form method="post">
										<input class="btn btn-success" type="submit" name="modify'.$value[0].'" value="Servido" />
									</form>
									</div>
									<div class="col-md-1">
										<h2>&nbsp;</h2>
										<button type="button" class="btn btn-danger BorrarPedido" MN="'.$exp[1].'" Oid="'.$exp[2].'" Pid="'.$value["id"].'"><i class="fa fa-times"></i></button>
									</div>
								</div>';
							}
						}
					}
				?>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="AgregarPedido">
	<div class="modal-dialog">
		<div class="modal-content">	
			<form method="post">	
				<div class="modal-body">
					<div class="box-body">	
						<div class="form-group">	
							<h2>Comida o Bebida:</h2>
							<select name="comida" id="select2" class="SC" style="width: 100%;" required>
								<option value="">Seleccionar...</option>
								<?php
									$columna = null;
									$valor = null;
									$comidas = ComidasC::VerComidasC($columna, $valor);
									foreach ($comidas as $key => $value) {	
										echo '<option Coid="'.$value["id"].'" value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<h2>Datos:</h2>
							<input type="text" class="form-control input-lg" id="datos" name="datos" readonly>
						</div>
						<div class="form-group">
							<h2>Cantidad:</h2>
							<input type="number" value="1" class="form-control input-lg" id="cantidad" name="cantidad" required>
						</div>
						<div class="form-group">
							<h2>Precio:</h2>
							<input type="number" class="form-control input-lg" id="precio" name="precio" readonly>
							<h2>Precio Final:</h2><!-- no esta mostrando-->
							<input type="number" class="form-control input-lg" id="precioF" name="precioF" readonly>
						</div>
						<div class="form-group">
							<h2>Extras:</h2>
							<textarea class="form-control" name="extras">
							</textarea>
								
							<?php

							echo '<input type="hidden" class="form-control input-lg" name="n_mesa" value="'.$exp[1].'">

							<input type="hidden" class="form-control input-lg" name="id_o" value="'.$exp[2].'">';

							?>
							<input type="hidden" name="listo" id="listo" value="Espera">
						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Agregar</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				$agregar = new OrdenesC();
				$agregar -> AgregarPedidoOrdenC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$borrar = new OrdenesC();
$borrar -> BorrarPedidoC();

?>