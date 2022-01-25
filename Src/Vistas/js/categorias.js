$(".table").on("click", ".EditarCategoria", function(){

	var Cid = $(this).attr("Cid");
	var datos = new FormData();

	datos.append("Cid", Cid);

	$.ajax({

		url: "Ajax/categoriasA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){

			$("#id").val(resultado["id"]);
			$("#categoria").val(resultado["categoria"]);

		}

	})

})



$(".table").on("click", ".BorrarCategoria", function(){

	var Cid = $(this).attr("Cid");

	swal({
		title: '¿Seguro que desea Borrar esta Categoría?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Aceptar' 
	}).then(function(resultado){

		if(resultado.value){

			window.location = "index.php?url=Categorias&Cid="+Cid;

		}

	})

})