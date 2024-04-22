<?php

require_once "../controladores/credenciales.controlador.php";
require_once "../modelos/credenciales.modelo.php";

require_once "../controladores/carpetas.controlador.php";
require_once "../modelos/carpetas.modelo.php";

class AjaxCredenciales{

 
 

  /*=============================================
  EDITAR CREDENCIALES
  =============================================*/ 

  public $idCredenciales;
  public $traerCredenciales;
  public $nombreCredenciales;

  public function ajaxEditarCredenciales(){

    if($this->traerCredenciales== "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorCredenciales::ctrMostrarCredenciales($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreCredenciales != ""){

      $item = "descripcion";
      $valor = $this->nombreCredenciales;
      $orden = "id";

      $respuesta = ControladorCredenciales::ctrMostrarCredenciales($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idCredenciales;
      $orden = "id";

      $respuesta = ControladorCredenciales::ctrMostrarCredenciales($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}



/*=============================================
EDITAR CREDENCIALES
=============================================*/ 

if(isset($_POST["idCredenciales"])){

  $editarCredenciales = new AjaxCredenciales();
  $editarCredenciales -> idCredenciales = $_POST["idCredenciales"];
  $editarCredenciales -> ajaxEditarCredenciales();

}








