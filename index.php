<?php


ini_set('display_errors',1);
ini_set("log_errors", 1);
ini_set("error_log", "C:/xampp/htdocs/kardex/php_error_log" );

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/carpetas.controlador.php";
require_once "controladores/credenciales.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/carpetas.modelo.php";
require_once "modelos/credenciales.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();