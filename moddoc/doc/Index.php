
<div class="container-fluid animated fadeIn delay-1s mt-4">
	<div class="row mt-4">
		<?php 
			$sql = "SELECT det.id_detgrupo, grp.grupo_n, grp.period_cuat, car.nombre_car FROM det_grupo det
			INNER JOIN grupos grp ON grp.id_grupo = det.id_grupo 
			INNER JOIN docentes doc ON doc.id_docente = det.id_docente
			INNER JOIN carreras car On car.id_carrera = det.id_carrera
			WHERE doc.id_docente = '".$keyDoc."' && det.estado_detgrp = 1";
			$result = $conexion->query($sql);
			$imp = "";
			$datAn = date("Y");
			while ($res = $result -> fetch_object()) {
				$notifGrpJustif = $docente->notifJustifGrp($keyDoc, $res->id_detgrupo);
				if ($notifGrpJustif->Cantidad > 0) {
					echo '
						<div class="col-sm-12 col-md-4">
							<div class="card shadow border-left-danger hovAnim">
							  	<div class="card-body">
							  	<div class="text-right">
							  		<span class="badge badge-danger" style="font-size:12px;">
							  		<i class="fas fa-clock mr-2"></i>Pendientes</span>
							  	</div>
							    	<h5 title="'.$res->nombre_car.'" class="card-title text-center text-truncate mt-3">
							    		'.$res->nombre_car.'
							    	</h5>
							  	</div>
							  	<ul class="list-group list-group-flush text-center">
							    	<h6 class="list-group-item text-primary">
							    		<i class="fas fa-users mr-2 "></i>
							    		'.$res->grupo_n.'
							    	</h6>
							    	<h6 class="list-group-item text-primary">
							    		<i class="fas fa-calendar mr-2 "></i>
							    		'.$res->period_cuat.' '.$datAn.'
							    	</h6>
							    </ul>
							  	<div class="card-body text-center">
							    	<a href="'.SERVERURLDOC.'DetGrp/'.base64_encode($res->id_detgrupo).'/" class="btn btn-outline-primary btn-md">
							    		<i class="fas fa-plus mr-2"></i>
							    		Detalles
							    	</a>
							  	</div>
							</div>
							<br>
						</div>';
				} else {
					echo '
						<div class="col-sm-12 col-md-4">
							<div class="card shadow border-left-primary hovAnim">
							  	<div class="card-body">
							  	<div class="text-right">
							  		<span class="badge badge-primary" style="font-size:12px;">
							  		<i class="fas fa-check mr-2"></i>Todo bien</span>
							  	</div>
							    	<h5 title="'.$res->nombre_car.'" class="card-title text-center text-truncate mt-3">
							    		'.$res->nombre_car.'
							    	</h5>
							  	</div>
							  	<ul class="list-group list-group-flush text-center">
							    	<h6 class="list-group-item text-primary">
							    		<i class="fas fa-users mr-2 "></i>
							    		'.$res->grupo_n.'
							    	</h6>
							    	<h6 class="list-group-item text-primary">
							    		<i class="fas fa-calendar mr-2 "></i>
							    		'.$res->period_cuat.' '.$datAn.'
							    	</h6>
							    </ul>
							  	<div class="card-body text-center">
							    	<a href="'.SERVERURLDOC.'DetGrp/'.base64_encode($res->id_detgrupo).'/" class="btn btn-outline-primary btn-sm">
							    		<i class="fas fa-plus mr-2"></i>
							    		Detalles
							    	</a>
							  	</div>
							</div>
							<br>
						</div>';
				}
				
			}
		?>
	</div>
</div>
