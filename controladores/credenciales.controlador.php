<?php

class ControladorCredenciales{

	/*=============================================
	MOSTRAR CREDENCIALES
	=============================================*/

	static public function ctrMostrarCredenciales($item, $valor, $orden){

		$tabla = "credenciales";

		$respuesta = ModeloCredenciales::mdlMostrarCredenciales($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR CREDENCIALES
	=============================================*/

	static public function ctrCrearCredenciales(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){


			 
				$tabla = "credenciales";

				$datos = array("id_carpetas" => $_POST["nuevaCarpetas"],
							   "nombre" => $_POST["nuevoNombre"],
							   "usuario" => $_POST["nuevoUsuario"],
							   "password" => $_POST["nuevoPassword"],
							   "web" => $_POST["nuevoWeb"],
							
							   );

				$respuesta = ModeloCredenciales::mdlIngresarCredenciales($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "Sus datos han sido guardados correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "credenciales";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "credenciales";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	EDITAR CREDENCIALES
	=============================================*/

	static public function ctrEditarCredenciales(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) ){

		   		

				$tabla = "credenciales";

				$datos = array("id_carpetas" => $_POST["editarCarpetas"],
							   "nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $_POST["editarPassword"],
							   "web" => $_POST["editarWeb"],
							 
							   );

				$respuesta = ModeloCredenciales::mdlEditarCredenciales($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "sus credenciales ha sido editadas correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "credenciales";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La credencial no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "credenciales";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	BORRAR CREDENCIALES
	=============================================*/
	static public function ctrEliminarCredenciales(){

		if(isset($_GET["idCredenciales"])){

			$tabla ="credenciales";
			$datos = $_GET["idCredenciales"];

			$respuesta = ModeloCredenciales::mdlEliminarCredenciales($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "la Credencial ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "credenciales";

								}
							})

				</script>';

			}		
		}


	}

	}