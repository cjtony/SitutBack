 <?php 

ob_start();
session_start();

if ($_SESSION['keyDevop'] == "" || $_SESSION['keyDevop'] == null) {
	header("Location:../../");
} else {
	require_once '../../modelos/devop.modelo.php';
	$devop = new Developer();
	$keyDevop = $_SESSION['keyDevop'];
	$fechAct = date("Y-m-d");
	$dbConexion = new Connect();
	$dbConexion = $dbConexion -> getDB();
	switch ($_GET['oper']) {
		case 'cuentCor':
			$inval = 0; $valid = 1;
			$param = isset($_POST['param']) ? trim($_POST['param']) : "";
			$opc = isset($_POST['opc']) ? trim($_POST['opc']) : "";
			if ($opc == 'desc') {
				$stmt = $dbConexion -> prepare("UPDATE coordinadores SET estado_cor = :inval WHERE id_coordinador = :param");
				$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			} else if ($opc == 'acti') {
				$stmt = $dbConexion -> prepare("UPDATE coordinadores SET estado_cor = :valid WHERE id_coordinador = :param");
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			}
			$stmt -> bindParam("param", $param, PDO::PARAM_INT);
			$resstmt = $stmt -> execute();
			if ($resstmt) {
				echo 1;
			} else {
				echo 0;
			}
			$stmt = null; $dbConexion = null;
			break;
		case 'reporCor':
			$inval = 0; $valid = 1;
			$param = isset($_POST['param']) ? trim($_POST['param']) : "";
			$opc = isset($_POST['opc']) ? trim($_POST['opc']) : "";
			if ($opc == 'desc') {
				$stmt = $dbConexion -> prepare("UPDATE coordinadores SET us_mod_rep = :inval WHERE id_coordinador = :param");
				$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			} else if ($opc == 'acti') {
				$stmt = $dbConexion -> prepare("UPDATE coordinadores SET us_mod_rep = :valid WHERE id_coordinador = :param");
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			}
			$stmt -> bindParam("param", $param, PDO::PARAM_INT);
			$resstmt = $stmt -> execute();
			if ($resstmt) {
				echo 1;
			} else {
				echo 0;
			}
			$stmt = null; $dbConexion = null;
			break;
		case 'cuentAdm':
			$inval = 0; $valid = 1;
			$param = isset($_POST['param']) ? trim($_POST['param']) : "";
			$opc = isset($_POST['opc']) ? trim($_POST['opc']) : "";
			if ($opc == 'desc') {
				$stmt = $dbConexion -> prepare("UPDATE administradores SET condicion = :inval WHERE id_admin = :param");
				$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			} else if ($opc == 'acti') {
				$stmt = $dbConexion -> prepare("UPDATE administradores SET condicion = :valid WHERE id_admin = :param");
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			}
			$stmt -> bindParam("param", $param, PDO::PARAM_INT);
			$resstmt = $stmt -> execute();
			if ($resstmt) {
				echo 1;
			} else {
				echo 0;
			}
			$stmt = null; $dbConexion = null;
			break;
		case 'reporAdm':
			$inval = 0; $valid = 1;
			$param = isset($_POST['param']) ? trim($_POST['param']) : "";
			$opc = isset($_POST['opc']) ? trim($_POST['opc']) : "";
			if ($opc == 'desc') {
				$stmt = $dbConexion -> prepare("UPDATE administradores SET us_mod_rep = :inval WHERE id_admin = :param");
				$stmt -> bindParam("inval", $inval, PDO::PARAM_INT);
			} else if ($opc == 'acti') {
				$stmt = $dbConexion -> prepare("UPDATE administradores SET us_mod_rep = :valid WHERE id_admin = :param");
				$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
			}
			$stmt -> bindParam("param", $param, PDO::PARAM_INT);
			$resstmt = $stmt -> execute();
			if ($resstmt) {
				echo 1;
			} else {
				echo 0;
			}
			$stmt = null; $dbConexion = null;
			break;
	default:
		$dbConexion = null;
		break;
	}
}

ob_end_flush();

?>