<?php

include 'conexion.php';
include 'conect.php';
class Coordinador
{
	public function __construct()
	{

	}

	public function userCorDet($id_coordinador){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$stmt = $dbc->prepare("SELECT * FROM coordinadores WHERE id_coordinador=:id_coordinador"); 
			$stmt->bindParam("id_coordinador", $id_coordinador,PDO::PARAM_INT);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function datDirCar($id_carrera){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$valid = 1;
			$stmt = $dbc->prepare("SELECT * FROM directores dir 
				INNER JOIN carreras car ON car.id_carrera = dir.id_carrera
				WHERE dir.estado_dir = :valid && car.id_carrera = :id_carrera"); 
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("id_carrera", $id_carrera,PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function cantAlmCar($id_carrera){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$valid = 1;
			$stmt = $dbc->prepare("SELECT COUNT(alm.id_alumno) AS 'CantAlm' FROM alumnos alm 
					INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
					INNER JOIN carreras car ON car.id_carrera = det.id_carrera
					WHERE alm.estado_al = :valid && alm.acept_grp = :valid && car.id_carrera = :id_carrera"); 
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("id_carrera", $id_carrera,PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function cantAlmInact($id_carrera){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$inval = 0;
			$valid = 1;
			$stmt = $dbc->prepare("SELECT COUNT(alm.id_alumno) AS 'CantAlm' FROM alumnos alm 
					INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
					INNER JOIN carreras car ON car.id_carrera = det.id_carrera
					INNER JOIN bajasalm_dat baj ON baj.id_alumno = alm.id_alumno
					WHERE NOT alm.id_alumno IN (SELECT id_alumno from bajasalm_dat baj WHERE baj.id_alumno = alm.id_alumno && baj.estado_baj_alm = 0) 
					&& car.id_carrera = :id_carrera && alm.acept_grp = :inval && alm.estado_al = :inval"); 
			//$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("id_carrera", $id_carrera,PDO::PARAM_INT);
			$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function cantAlmAcept($id_carrera){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$inval = 0;
			$valid = 1;
			$stmt = $dbc->prepare("SELECT COUNT(alm.id_alumno) AS 'CantAlm' FROM alumnos alm 
					INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
					INNER JOIN carreras car ON car.id_carrera = det.id_carrera
					WHERE alm.acept_grp = :inval && alm.estado_al = :valid && car.id_carrera = :id_carrera"); 
			$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("id_carrera", $id_carrera,PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function cantBajCar($id_carrera){
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$valid = 1;
			$stmt = $dbc->prepare("SELECT COUNT(alm.id_alumno) AS 'CantAlm' FROM alumnos alm
				INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
				INNER JOIN carreras car ON car.id_carrera = det.id_carrera
				INNER JOIN bajasalm_dat baj ON baj.id_alumno = alm.id_alumno
				WHERE car.id_carrera = :id_carrera && baj.estado_baj_alm = :valid");
			$stmt -> bindParam("id_carrera", $id_carrera,PDO::PARAM_INT);
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt->fetch(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function datGrpCarSel($id_grupo, $id_carrera) {
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$valid = 1;
			$stmt = $dbc -> prepare("SELECT * FROM alumnos alm 
				INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
				INNER JOIN grupos grp ON grp.id_grupo = det.id_grupo
				INNER JOIN carreras car ON car.id_carrera = det.id_carrera
				INNER JOIN docentes doc ON doc.id_docente = det.id_docente
				WHERE grp.id_grupo = :id_grupo && car.id_carrera = :id_carrera && alm.estado_al = :valid && alm.acept_grp = :valid");
			$stmt -> bindParam("id_grupo", $id_grupo, PDO::PARAM_INT);
			$stmt -> bindParam("id_carrera", $id_carrera, PDO::PARAM_INT);
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function datAlmGrpCarSel($id_grupo, $id_carrera, $id_alumno) {
		try {
			$dbc = new Connect();
			$dbc = $dbc -> getDB();
			$valid = 1;
			$stmt = $dbc -> prepare("SELECT * FROM alumnos alm 
				INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
				INNER JOIN grupos grp ON grp.id_grupo = det.id_grupo
				INNER JOIN carreras car ON car.id_carrera = det.id_carrera
				INNER JOIN docentes doc ON doc.id_docente = det.id_docente
				WHERE grp.id_grupo = :id_grupo && car.id_carrera = :id_carrera && alm.estado_al = :valid && alm.acept_grp = :valid && alm.id_alumno = :id_alumno");
			$stmt -> bindParam("id_grupo", $id_grupo, PDO::PARAM_INT);
			$stmt -> bindParam("id_carrera", $id_carrera, PDO::PARAM_INT);
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			$stmt -> bindParam("id_alumno", $id_alumno, PDO::PARAM_INT);
			$stmt -> execute();
			$data = $stmt -> fetch(PDO::FETCH_OBJ);
			return $data;
		} catch (PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function datPerAlm($id_alumno, $id_carrera, $id_grupo) {
    	try {
    		$dbc = new Connect();
			$dbc = $dbc -> getDB();
    		$stmt = $dbc -> prepare("SELECT * FROM alumnos alm 
				INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
				INNER JOIN grupos grp ON grp.id_grupo = det.id_grupo
				INNER JOIN carreras car ON det.id_carrera = car.id_carrera
				INNER JOIN datpersonales_alm dat ON dat.id_alumno = alm.id_alumno
				WHERE alm.id_alumno = :id_alumno && car.id_carrera = :id_carrera &&
				grp.id_grupo = :id_grupo
				");
    		$stmt -> bindParam("id_alumno", $id_alumno, PDO::PARAM_INT);
    		$stmt -> bindParam("id_carrera", $id_carrera, PDO::PARAM_INT);
    		$stmt -> bindParam("id_grupo", $id_grupo, PDO::PARAM_INT);
    		$stmt -> execute();
    		$data = $stmt -> fetch(PDO::FETCH_OBJ);
    		return $data;
    	} catch (PDOException $e) {
    		echo '{"error":{"text":'.$e->getMessage().'}}';
    	}
    }

    public function datCarSel($id_carrera) {
    	try {
    		$dbc = new Connect();
			$dbc = $dbc -> getDB();
    		$stmt = $dbc -> prepare("SELECT * FROM carreras WHERE id_carrera = :id_carrera");
    		$stmt -> bindParam("id_carrera", $id_carrera, PDO::PARAM_INT);
    		$stmt -> execute();
    		$data = $stmt -> fetch(PDO::FETCH_OBJ);
    		return $data;
    	} catch (PDOException $e) {
    		echo '{"error":{"text":'.$e->getMessage().'}}';
    	}
    }



}