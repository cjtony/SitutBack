<?php 

ob_start();
session_start();

if ($_SESSION['keyDir'] == "" || $_SESSION['keyDir'] == null) {
	header("Location:../../Index.php");
} else {
	require_once '../../modelos/director.modelo.php';
	$director = new Director();
	$keyDir = $_SESSION['keyDir'];
	$fechAct = date("Y-m-d");
	$dbConexion = new Connect();
	$dbConexion = $dbConexion -> getDB();
	switch ($_GET['oper']) {
		case 'cantAlmCar':
			$clvCar = $director -> userDirDet($keyDir);
			$idCar = $clvCar->id_carrera;
			$consult = $dbConexion -> prepare("SELECT COUNT(id_alumno) AS 'cantAlmCar' FROM alumnos alm
				INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
				INNER JOIN carreras car ON car.id_carrera = det.id_carrera
				WHERE car.id_carrera = :id_car");
			$consult -> bindParam("id_car", $idCar, PDO::PARAM_INT);
			$consult -> execute();
			$salida = "";
			while ( $data = $consult -> fetch(PDO::FETCH_ASSOC) ) {
				$salida .= $data["cantAlmCar"];
			}
			echo $salida;
			$dbConexion = null; $consult = null;
			break;
		case 'cantGrpCar':
			$clvCar = $director -> userDirDet($keyDir);
			$idCar = $clvCar->id_carrera;
			$consult = $dbConexion -> prepare("SELECT COUNT(id_detgrupo) AS 'cantGrpCar' FROM det_grupo det
				INNER JOIN carreras car ON car.id_carrera = det.id_carrera
				WHERE car.id_carrera = :id_car");
			$consult -> bindParam("id_car", $idCar, PDO::PARAM_INT);
			$consult -> execute();
			$salida = "";
			while ( $data = $consult -> fetch(PDO::FETCH_ASSOC) ) {
				$salida .= $data["cantGrpCar"];
			}
			echo $salida;
			$dbConexion = null; $consult = null;
			break;	
		default:
			$dbConexion = null;
		break;
	}
}