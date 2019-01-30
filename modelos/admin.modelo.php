<?php

include 'conexion.php';
include 'conect.php';
class Administrador
{
	public function __construct()
	{

	}

	public function userAdminDet($id_admin){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT * FROM administradores WHERE id_admin=:id_admin"); 
			$stmt->bindParam("id_admin", $id_admin,PDO::PARAM_INT);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	/*=============================================
	=            Cantidad carreras A/I            =
	=============================================*/
	
	public function estadistCarCant(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_carrera) AS 'Cantidad' FROM carreras");
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function estadistCarAct(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_carrera) AS 'CantidadAct' FROM carreras WHERE estado_car = 1");
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function estadistCarDes(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_carrera) AS 'CantidadDes' FROM carreras WHERE estado_car = 0");
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	
	/*=====  End of Cantidad carreras A/I  ======*/

	/*===============================================
	=            Cantidad directores A/I            =
	===============================================*/
	
	public function estadistDirCant(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_director) AS 'Cantidad' FROM directores");
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function estadistDirAct(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_director) AS 'CantidadAct' FROM directores WHERE estado_dir = 1");
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function estadistDirDes(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_director) AS 'CantidadDes' FROM directores WHERE estado_dir = 0");
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	
	/*=====  End of Cantidad directores A/I  ======*/

	/*=============================================
	=            Cantidad docentes(tutores) A/I            =
	=============================================*/

	public function estadistDocCant(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_docente) AS 'Cantidad' FROM docentes");
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function estadistDocCantAct(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_docente) AS 'CantidadAct' FROM docentes WHERE condicion_doc = 1");
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function estadistDocCantDes(){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT count(id_docente) AS 'CantidadDes' FROM docentes WHERE condicion_doc = 0");
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	
	/*=====  End of Cantidad docentes(tutores) A/I  ======*/
	public function mostrarCarrera($id_carrera)
    {
        $sql="SELECT * FROM carreras WHERE id_carrera='$id_carrera'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function selectCarrera(){
    	$sql = "SELECT * FROM carreras";
    	return ejecutarConsulta($sql);
    }
    public function mostrarDirector($id_director){
    	$sql = "SELECT * FROM directores dir INNER JOIN carreras car ON car.id_carrera = dir.id_carrera
    	WHERE dir.id_director = '$id_director'";
    	return ejecutarConsultaSimpleFila($sql);
    }
    public function mostrarAdm($id_admin){
    	$sql = "SELECT * FROM administradores WHERE id_admin = '$id_admin'";
    	return ejecutarConsultaSimpleFila($sql);
    }
    public function desactivarCEsc($id_ciclo_escolar) {
    	$sql = "UPDATE ciclo_escolar SET estado_cic_esc = '0' WHERE id_ciclo_escolar = '$id_ciclo_escolar'";
    	return ejecutarConsulta($sql);
    }
    public function activarCEsc($id_ciclo_escolar) {
    	$sql = "UPDATE ciclo_escolar SET estado_cic_esc = '1' WHERE id_ciclo_escolar = '$id_ciclo_escolar'";
    	return ejecutarConsulta($sql);
    }
    public function mostrarCor($id_coordinador){
    	$sql = "SELECT * FROM coordinadores WHERE id_coordinador = '$id_coordinador'";
    	return ejecutarConsultaSimpleFila($sql);
    }
}