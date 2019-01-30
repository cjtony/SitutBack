<?php 

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once '../modelos/conect.php';
$dbc = new Connect();
$dbc = $dbc -> getDB();

if ($_GET["oper"] != "") {
	switch ($_GET["oper"]) {
		case 'verificarLog':
			try {
				$correoAdm = isset($_POST['correoAdm']) ? trim($_POST['correoAdm']) : "";
				$passAdm = isset($_POST['passAdm']) ? trim($_POST['passAdm']) : "";
				$passEncript = sha1($passAdm); $valid = 1;
				$stmt = $dbc -> prepare("SELECT * FROM administradores WHERE  usuario = :correoAdm AND contrasena = :passEncript && condicion = :valid");
				$stmt -> bindParam("correoAdm", $correoAdm, PDO::PARAM_STR);
				$stmt -> bindParam("passEncript", $passEncript, PDO::PARAM_STR);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> execute(); $filStmt = $stmt -> rowCount();
				if ($filStmt === 1) {
					$row = $stmt -> fetch(PDO::FETCH_OBJ);
					if (isset($row)) {
						$_SESSION['keyAdm'] = $row->id_admin;
					}
					echo 1;
				} else {
					echo "mal";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			} finally {
				$stmt = null; $dbc = null;
				unset($correoAdm); unset($passAdm); unset($passEncript);
			}
			break;
		case 'verificarLogCor':
			try {
				$correoCor = isset($_POST['correoCor']) ? trim($_POST['correoCor']) : "";
				$passCor = isset($_POST['passCor']) ? trim($_POST['passCor']) : "";
				$passEncript = sha1($passCor); $valid = 1;
				$stmt = $dbc -> prepare("SELECT * FROM coordinadores WHERE correo_cor = :correoCor && contrasena_cor = :passEncript && estado_cor = :valid");
				$stmt -> bindParam("correoCor", $correoCor, PDO::PARAM_STR);
				$stmt -> bindParam("passEncript", $passEncript, PDO::PARAM_STR);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> execute(); $filStmt = $stmt -> rowCount();
				if ($filStmt === 1) {
					$row = $stmt -> fetch(PDO::FETCH_OBJ);
					if (isset($row)) {
						$_SESSION['keyCor'] = $row->id_coordinador;
					}
					echo 1;
				} else {
					echo "mal";
				} 
			} catch (PDOException $e) {
				echo $e->getMessage();
			} finally {
				$stmt = null; $dbc = null;
				unset($correoCor); unset($passCor); unset($passEncript);
			}
			break;	
		case 'verificarLogDir':
			try {
				$correoDir = isset($_POST['correoDir']) ? trim($_POST['correoDir']) : "";
				$passDir = isset($_POST['passDir']) ? trim($_POST['passDir']) : "";
				$passDirEnc = sha1($passDir); $valid = 1;
				$stmt = $dbc -> prepare("SELECT * FROM directores WHERE correo_dir = :correoDir && contrasena_dir = :passDirEnc && estado_dir = :valid");
				$stmt -> bindParam("correoDir", $correoDir, PDO::PARAM_STR);
				$stmt -> bindParam("passDirEnc", $passDirEnc, PDO::PARAM_STR);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> execute(); $filStmt = $stmt -> rowCount();
				if ($filStmt === 1) {
					$row = $stmt -> fetch(PDO::FETCH_OBJ);
					if (isset($row)) {
						$_SESSION['keyDir'] = $row->id_director;
					}
					echo 1;
				} else {
					echo "mal";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			} finally {
				$stmt = null; $dbc = null;
				unset($correoDir); unset($passDir); unset($passDirEnc);
			}
			break;	
		case 'verificarLogDoc':
			try {
				$correoDoc = isset($_POST['correoDoc']) ? trim($_POST['correoDoc']) : "";
				$passDoc = isset($_POST['passDoc']) ? trim($_POST['passDoc']) : "";
				$passDocEnc = sha1($passDoc); $valid = 1;
				$stmt = $dbc -> prepare("SELECT * FROM docentes WHERE correo_doc = :correoDoc && contrasena_doc = :passDocEnc && condicion_doc = :valid");
				$stmt -> bindParam("correoDoc", $correoDoc, PDO::PARAM_STR);
				$stmt -> bindParam("passDocEnc", $passDocEnc, PDO::PARAM_STR);
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
				$stmt -> execute(); $filStmt = $stmt -> rowCount();
				if ($filStmt === 1) {
					$row = $stmt -> fetch(PDO::FETCH_OBJ);
					if (isset($row)) {
						$_SESSION['keyDoc'] = $row->id_docente;
					}
					echo 1;
				} else {
					echo "mal";
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			} finally {
				$dbc = null; $stmt = null;
				unset($correoDoc); unset($passDoc); unset($passDocEnc);
			}
			break;
		default:
			//header("Location:../Index.php");
			$dbc = null;
			die();
			break;
	}
} else {
	include 'Error.php';
}
