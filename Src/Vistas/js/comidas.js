//se ejecuten las textarea se ejecuta la funcion 
$('textarea').each(function(){
//datos escribrir
	$(this).val($(this).val().trim());

})


$(".table").on("click", ".BorrarComida", function(){

	var Coid = $(this).attr("Coid");

	swal({
		title: '¿Seguro qué desea Borrar esta Comida?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Aceptar' 
	}).then(function(resultado){

		if(resultado.value){

			window.location = "index.php?url=Comidas&Coid="+Coid;

		}

	})

})