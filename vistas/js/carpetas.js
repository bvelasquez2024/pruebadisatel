/*=============================================
EDITAR CARPETAS
=============================================*/
$(".tablas").on("click", ".btnEditarCarpetas", function(){

	var idCarpetas = $(this).attr("idCarpetas");

	var datos = new FormData();
	datos.append("idCarpetas", idCarpetas);

	$.ajax({
		url: "ajax/carpetas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCarpetas").val(respuesta["carpetas"]);
     		$("#idCarpetas").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CARPETAS
=============================================*/
$(".tablas").on("click", ".btnEliminarCarpetas", function(){

	 var idCarpetas = $(this).attr("idCarpetas");

	 swal({
	 	title: '¿Está seguro de borrar la carpeta?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar carpeta'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=carpetas&idCarpetas="+idCarpetas;

	 	}

	 })

})