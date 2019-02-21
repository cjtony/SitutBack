<?php 


$cod = explode("/", $_GET['view']);
$param1 = $cod[1];
$param2 = base64_decode($cod[2]);
	
	
?>

<div class="container-fluid animated fadeIn delay-1s">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-gray-800">
	    	<i class="fas fa-file-alt mr-2 text-primary"></i>
	    	Detalle de reporte
	    </h1>
	    <a href="<?php echo SERVERURLDEV; ?>EstateRep/<?php echo $param1; ?>/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
	      <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i> Regresar 
	    </a>
	</div>



</div>