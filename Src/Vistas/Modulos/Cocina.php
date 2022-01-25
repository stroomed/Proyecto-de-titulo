<?php
	if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Cocinero"){
		echo '<script>
				window.location = "Cocina";
			</script>';
		return;
	}
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Área cocina</h1>
	</section>
	<section class="content">
		<div class="row M">
			<div class="box">
				<div class="box-body">
					<h2>Pedidos:</h2>
					<?php
						$o_pedidos = OrdenesC::VerPedidosOrdenCprueba();
						$conn = new PDO("mysql:host=localhost;dbname=restaurante","root","");
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						if($o_pedidos!=null){
							foreach ($o_pedidos as $key => $value){
								if(isset($_POST['modify'.$value[0].'']))
								{
									$sql = "UPDATE o_pedidos SET listo = 'Terminado' WHERE id=$value[0]";
									$stmt = $conn->prepare($sql);
									$stmt->execute();
								}
								echo '
								<div>
								<div class="col-md-3 col-xs-6" style="background:#d5e1df; margin:2px">
									<h2>Mesa N°: '.$value[7].' </h2>	
									<h3><b>Pedido:</b> '.$value[1].'<br> <b>Cantidad:</b> '.$value[3].'<br> <b>Extras: </b>'.$value[4].' <br> <b>Estado: </b>'.$value[5].' </h3>
									<form method="post">
										<input class="btn btn-primary" style="margin: 0px 0px 5px 82%;" type="submit" name="modify'.$value[0].'" value="Finalizar"/>
									</form>
									</div>
								</div>';
							}
						}else{
							echo '<h1>No hay pedidos</h1>';
						}
						
					?>		
				</div>
			</div>
		</div>	
	</section>
</div>
<script type="text/javascript">
	var timeout = setTimeout("location.reload(true);",15000);
	function resetTimeout() {
	clearTimeout(timeout);
	timeout = setTimeout("location.reload(true);",15000);
	}
</script>
