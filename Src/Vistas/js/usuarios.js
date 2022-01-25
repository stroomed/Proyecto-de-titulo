$(".table").on("click", ".EditarUsuarios", function(){

	var Uid = $(this).attr("Uid");

	var datos = new FormData();

	datos.append("Uid", Uid);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){

			$("#id").val(resultado["id"]);
			$("#apellido").val(resultado["apellido"]);
			$("#nombre").val(resultado["nombre"]);
			$("#usuario").val(resultado["usuario"]);
			$("#clave").val(resultado["clave"]);
			$("#rol").val(resultado["rol"]);

		}

	})

})




$(".table").on("click", ".BorrarUsuario", function(){

	var Uid = $(this).attr("Uid");

	swal({
		title: '¿Seguro que desea Borrar este Usuario?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Aceptar' 
	}).then(function(resultado){

		if(resultado.value){

			window.location = "index.php?url=Usuarios&Uid="+Uid;

		}

	})

})