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
		case 'listCor':
			$stmt = $dbConexion -> prepare("SELECT * FROM coordinadores");
			$stmt -> execute();
			$data = Array();
			while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
				$data[] = array(
					"0" => $res -> nombre_c_cor,
					"1" => $res -> correo_cor,
					"2" => $res -> telefono_cor
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
			break;

	default:
		$dbConexion = null;
		break;
	}
}

ob_end_flush();

?>