<?php 

session_start();

if ($_SESSION['keyCor'] == "" || $_SESSION['keyCor'] == null) {
	header("Location:../../Index.php");
} else {
	require_once '../../modelos/coordinador.modelo.php';
	include '../../modelos/rutasAmig.php';
	$coordinador = new Coordinador();
	$keyCor = $_SESSION['keyCor'];
	$clvCar = base64_decode($_SESSION['clvCar']);
	$dbConexion = new Connect();
	$dbConexion = $dbConexion -> getDB();
	switch ($_GET['oper']) {
		case 'listGrpCar':
			try {
				$valid = 1;
				$stmt = $dbConexion -> prepare("SELECT grp.id_grupo, COUNT(alm.id_alumno) AS 'CantAlm', grp.grupo_n, car.id_carrera FROM alumnos alm 
					INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
					INNER JOIN carreras car ON car.id_carrera = det.id_carrera
					INNER JOIN grupos grp ON grp.id_grupo = det.id_grupo
					WHERE car.id_carrera = :clvCar && alm.estado_al = :valid && alm.acept_grp = :valid GROUP BY grp.grupo_n");
				$stmt -> bindParam("clvCar", $clvCar, PDO::PARAM_INT);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> execute();
				$data = Array();
				while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
					$data[] = array(
						"0" => '<span class="badge badge-pill badge-info font-weight-normal">'.$res -> grupo_n.'</span>',
						"1" => '<span class="badge badge-pill badge-info font-weight-normal">'.$res -> CantAlm.'</span>',
						"2" => '<a href="'.SERVERURLCOR.'DetGrp/'.base64_encode($res->id_grupo).'/'.base64_encode($res->id_carrera).'" class="btn btn-outline-primary">Detalles</a>'
					);
				}
				$results = array(
	        		"sEcho"=>1,
	        		"iTotalRecords"=>count($data),
	        		"iTotalDisplayRecords"=>count($data),
	        		"aaData"=>$data);
	        	echo json_encode($results);
			} catch (PDOException $e) {
				echo $e->getMessage();
			} finally {
				$stmt = null; $dbConexion = null;
				unset($valid, $data, $results);
			}
			break;		
		case 'listAlmGrpCar':
			try {
				$clvGrp = base64_decode($_SESSION['clvGrp']);
				$valid = 1;
				$stmt = $dbConexion -> prepare("SELECT * FROM alumnos alm 
					INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
					INNER JOIN grupos grp ON grp.id_grupo = det.id_grupo
					INNER JOIN carreras car ON car.id_carrera = det.id_carrera
					INNER JOIN docentes doc ON doc.id_docente = det.id_docente
					WHERE grp.id_grupo = :clvGrp && car.id_carrera = :clvCar && alm.estado_al = :valid && alm.acept_grp = :valid");
				$stmt -> bindParam("clvGrp", $clvGrp, PDO::PARAM_INT);
				$stmt -> bindParam("clvCar", $clvCar, PDO::PARAM_INT);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> execute();
				$data = Array();
				while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
					$data[] = array(
						"0" => $res -> nombre_c_al,
						"1" => $res -> matricula_al,
						"2" => $res -> correo_al,
						"3" => '<a href="'.SERVERURLCOR.'DetPerfAlm/'.base64_encode($res->id_alumno).'/'.base64_encode($res->id_carrera).'/'.base64_encode($res->id_grupo).'" class="btn btn-outline-primary btn-md"> <i class="fas fa-eye mr-2"></i>Perfil </a>'
					);
				}
				$results = array(
	        		"sEcho"=>1,
	        		"iTotalRecords"=>count($data),
	        		"iTotalDisplayRecords"=>count($data),
	        		"aaData"=>$data);
	        	echo json_encode($results);
	        	$stmt = null;
	        	$dbConexion = null;
			} catch (PDOException $e) {
				echo $e->getMessage();
			} finally {
				$dbConexion = null; $stmt = null;
				unset($valid, $data, $results);
			}
			break;		
		default:
			$dbConexion = null;
			break;
	}
}