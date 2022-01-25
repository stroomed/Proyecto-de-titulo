<?php
	if($_SESSION["rol"] != "Administrador"){
		echo '<script>
				window.location = "Inicio";
			</script>';
		return;
    }
    $conn = new PDO("mysql:host=localhost;dbname=restaurante","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    function conexion(){
        return mysqli_connect('localhost', 'root', '', 'restaurante');
    }
    $conn = conexion();
    $sql = "SELECT  fecha, total_o from graficas ORDER BY fecha";
    $result = mysqli_query($conn, $sql);
    $valoresY=array();//montos
    $valoresX=array();//ventas

    while ($ver=mysqli_fetch_row($result)){
        $valoresY[]=$ver[1];
        $valoresX[]=$ver[0];
    }
    $datoX=json_encode($valoresX);
    $datoY=json_encode($valoresY);

?>

<div class="content-wrapper">
	<section class="content-header">	
		<div id="myDiv"></div>
        <div>
        <h1>Ventas</h1>
        <table class="table table-striped" border=2>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Venta</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlD = "SELECT total_o, fecha from graficas";
                $resultD = mysqli_query($conn, $sqlD);
                while($mostrar = mysqli_fetch_array($resultD)){
                ?>
                <tr>
                <td><?php echo $mostrar['total_o'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>  
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
	</section>
</div>

<script type="text/javascript">
    function crearCadenaLienal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">

    datosX = crearCadenaLienal('<?php echo $datoX ?>');
    datosY = crearCadenaLienal('<?php echo $datoY ?>');

    var trace1 = {
    x: datosX,
    y: datosY,
    type: 'scatter',
    line: {
      color: 'Red',
      width: 2
    }}
    var layout = {
        title: 'Gráfica de ventas',
        xaxis: {
            title: 'Fechas'
        },
        yaxis: {
            title: 'Montos'
        }
    };
    
    var data = [trace1];

    Plotly.newPlot('myDiv', data, layout);
</script>