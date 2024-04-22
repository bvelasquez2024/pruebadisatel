<?php

require_once "../controladores/carpetas.controlador.php";
require_once "../modelos/carpetas.modelo.php";

class AjaxCarpetas{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCarpetas;

	public function ajaxEditarCarpetas(){

		$item = "id";
		$valor = $this->idCarpetas;

		$respuesta = ControladorCarpetas::ctrMostrarCarpetas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCarpetas"])){

	$carpetas = new AjaxCarpetas();
	$carpetas -> idCarpetas = $_POST["idCarpetas"];
	$carpetas -> ajaxEditarCarpetas();
}
