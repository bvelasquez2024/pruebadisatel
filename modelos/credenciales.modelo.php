<?php

require_once "conexion.php";

class ModeloCredenciales{

	/*=============================================
	MOSTRAR CREDENCIALES
	=============================================*/

	static public function mdlMostrarCredenciales($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRAR CREDENCIALES
	=============================================*/
	static public function mdlIngresarCredenciales($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_carpetas, nombre, usuario, password) VALUES (:id_carpetas, :nombre, :usuario, :password)");

		$stmt->bindParam(":id_carpetas", $datos["id_carpetas"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CREDENCIALES
	=============================================*/
	static public function mdlEditarCredenciales($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_carpetas = :id_carpetas, nombre = :nombre, usuario = :usuario, password = :password WHERE codigo = :codigo");

		$stmt->bindParam(":id_carpetas", $datos["id_carpetas"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CREDENCIALES
	=============================================*/

	static public function mdlEliminarCredenciales($tabla, $datos){

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

	/*=============================================
	ACTUALIZAR CREDENCIALES
	=============================================*/

	static public function mdlActualizarCredenciales($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



}