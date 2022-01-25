$(".M").on("click", ".BorrarMesa", function(){

	var Mid = $(this).attr("Mid");

	swal({
		title: '¿Seguro qué desea Borrar esta Mesa?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Aceptar' 
	}).then(function(resultado){

		if(resultado.value){

			window.location = "index.php?url=Inicio&Mid="+Mid;

		}

	})

})




$(".SC").change(function(){

	var Coid = $(this).val();

	var datos = new FormData();

	datos.append("Coid", Coid);

	$.ajax({

		url: "http://localhost/restauranteTest/Ajax/ordenesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		processData: false,
		contentType: false,

		success: function(resultado){

			$("#precio").val(resultado["precio"]);
			$("#datos").val(resultado["datos"]);

			var cantidad = $("#cantidad").val();

			total = Number(cantidad) * Number(resultado["precio"]);
			totalF = parseFloat(total);

			$("#precioF").val(totalF);

		}

	})

})



$(".Pedido").on("click", ".BorrarPedido", function(){

	var Pid = $(this).attr("Pid");
	var MN = $(this).attr("MN");
	var Oid = $(this).attr("Oid");

	swal({
		title: '¿Seguro qué desea Borrar este Pedido?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Aceptar' 
	}).then(function(resultado){

		if(resultado.value){

			window.location = "http://localhost/restauranteTest/index.php?url=Orden&MN="+MN+"&Oid="+Oid+"&Pid="+Pid;

		}

	})

})
