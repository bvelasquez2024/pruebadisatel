/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

var perfilOculto = $("#perfilOculto").val();

$('.tablaProductos').DataTable( {
    "ajax": "ajax/datatable-productos.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );



/*=============================================
EDITAR CREDENCIALES
=============================================*/

$(".tablaCredenciales tbody").on("click", "button.btnEditarCredenciales", function(){

	var idProducto = $(this).attr("idCredenciales");
	
	var datos = new FormData();
    datos.append("idCredenciales", idCredenciales);

     $.ajax({

      url:"ajax/credenciales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          
          var datosCarpeta = new FormData();
          datosCarpeta.append("idCarpetas",respuesta["id_carpetas"]);

           $.ajax({

              url:"ajax/carpetas.ajax.php",
              method: "POST",
              data: datosCarpetas,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarCarpetas").val(respuesta["id"]);
                  $("#editarCarpetas").html(respuesta["carpetas"]);

              }

          })

           $("#editarNombre").val(respuesta["nombre"]);

           $("#editarUsuario").val(respuesta["usuario"]);

           $("#editarPasswor").val(respuesta["password"]);

           $("#editarUrl").val(respuesta["web"]);

           $("#editarPrecioVenta").val(respuesta["precio_venta"]);
      
     
      }

  })

})

/*=============================================
ELIMINAR CREDENCIALES
=============================================*/

$(".tablaCredenciales tbody").on("click", "button.btnEliminarCredenciales", function(){

	
	
	swal({

		title: '¿Está seguro de borrar la credencial?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;

        }


	})

})
	


