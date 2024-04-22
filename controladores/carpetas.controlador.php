<?php

class ControladorCarpetas{

	/*=============================================
	CREAR CARPETAS
	=============================================*/

	static public function ctrCrearCarpetas(){

		if(isset($_POST["nuevaCarpetas"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCarpetas"])){

				$tabla = "carpetas";

				$datos = $_POST["nuevaCarpetas"];

				$respuesta = ModeloCarpetas::mdlIngresarCarpetas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La carpeta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carpetas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "carpetas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CARPETAS
	=============================================*/

	static public function ctrMostrarCarpetas($item, $valor){

		$tabla = "carpetas";

		$respuesta = ModeloCarpetas::mdlMostrarCarpetas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CARPETAS
	=============================================*/

	static public function ctrEditarCarpetas(){

		if(isset($_POST["editarCarpetas"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCarpetas"])){

				$tabla = "carpetas";

				$datos = array("carpetas"=>$_POST["editarCarpetas"],
							   "id"=>$_POST["idCarpetas"]);

				$respuesta = ModeloCarpetas::mdlEditarCarpetas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

							window.location = "carpetas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "carpetas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CARPETAS
	=============================================*/

	static public function ctrBorrarCarpetas(){

		if(isset($_GET["idCarpetas"])){

			$tabla ="Carpetas";
			$datos = $_GET["idCarpetas"];

			$respuesta = ModeloCarpetas::mdlBorrarCarpetas($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carpetas";

									}
								})

					</script>';
			}
		}
		
	}
}
