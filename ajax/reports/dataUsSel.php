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
					"1" => ($res->estado_cor)?'<span class="badge badge-primary mr-3 badge-pill">Habilitada</span>'.'<button class="btn btn-sm btn-outline-danger" onclick="desactCuent('.$res->id_coordinador.')"><i class="fas fa-times mr-2"></i>Deshabilitar</button>':
                    '<span class="badge badge-danger mr-3 badge-pill">Deshabilitada</span>'.'<button class="btn btn-sm btn-outline-primary" onclick="activaCuent('.$res->id_coordinador.')"><i class="fas fa-check mr-2"></i>Habilitar</button>',
					"2" => ($res->us_mod_rep)?'<span class="badge badge-primary mr-3 badge-pill">Habilitados</span>'.'<button class="btn btn-sm btn-outline-danger" onclick="desactRep('.$res->id_coordinador.')"><i class="fas fa-times mr-2"></i>Deshabilitar</button>':
                    '<span class="badge badge-danger mr-3 badge-pill">Deshabilitados</span>'.'<button class="btn btn-sm btn-outline-primary" onclick="activaRep('.$res->id_coordinador.')"><i class="fas fa-check mr-2"></i>Habilitar</button>',

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
		case 'listAdm':
			$stmt = $dbConexion -> prepare("SELECT * FROM administradores");
			$stmt -> execute();
			$data = Array();
			while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
				$data[] = array(
					"0" => $res -> nombre_c,
					"1" => $res -> privileg,
					"2" => ($res->condicion)?'<span class="badge badge-primary mr-3 badge-pill">Habilitada</span>'.'<button class="btn btn-sm btn-outline-danger" onclick="desactCuent('.$res->id_admin.')"><i class="fas fa-times mr-2"></i>Deshabilitar</button>':
                    '<span class="badge badge-danger mr-3 badge-pill">Deshabilitada</span>'.'<button class="btn btn-sm btn-outline-primary" onclick="activaCuent('.$res->id_admin.')"><i class="fas fa-check mr-2"></i>Habilitar</button>',
					"3" => ($res->us_mod_rep)?'<span class="badge badge-primary mr-3 badge-pill">Habilitados</span>'.'<button class="btn btn-sm btn-outline-danger" onclick="desactRep('.$res->id_admin.')"><i class="fas fa-times mr-2"></i>Deshabilitar</button>':
                    '<span class="badge badge-danger mr-3 badge-pill">Deshabilitados</span>'.'<button class="btn btn-sm btn-outline-primary" onclick="activaRep('.$res->id_admin.')"><i class="fas fa-check mr-2"></i>Habilitar</button>',

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