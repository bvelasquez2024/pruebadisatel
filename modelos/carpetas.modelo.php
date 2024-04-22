<?php

require_once "conexion.php";

class ModeloCarpetas{

	/*=============================================
	CREAR CARPETA
	=============================================*/

	static public function mdlIngresarCarpetas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(carpetas) VALUES (:carpetas)");

		$stmt->bindParam(":carpetas", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CARPETAS
	=============================================*/

	static public function mdlMostrarCarpetas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CARPETAS
	=============================================*/

	static public function mdlEditarCarpetas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carpetas = :carpetas WHERE id = :id");

		$stmt -> bindParam(":carpetas", $datos["carpetas"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CARPETAS
	=============================================*/

	static public function mdlBorrarCarpetas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

