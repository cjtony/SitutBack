<?php 

	$keyDoc = $_SESSION['keyDoc'];
	$codigo = explode('/', $_GET['view']);
	$valHistAlm = $codigo[1];
	$valHistAlmDec = base64_decode($valHistAlm);
	$datDoce = $docente->userDocDet($keyDoc);
	$alm = $_SESSION["clvAlm"];
	$datAlm = $docente->datPerfAlm($alm);
	$datHist = $docente -> datHistAlm($valHistAlmDec);
	function formatFech($fechForm) {
		$fechDat = substr($fechForm, 0,4);
		$fechM = substr($fechForm, 5,2);
		$fechD = substr($fechForm, 8,2);
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$Fecha = date($fechD)." de ".$meses[date($fechM)-1]. " del ".date($fechDat);
		return $Fecha;
	}
	if ($datDoce) {
?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<button data-toggle="modal" data-target="#almHist" class="btn text-primary bg-white rounded cardShadow mr-3 btn-md">
					<i class="fas fa-list icoIni"></i>
					Historial
				</button>
				<a href="<?php echo SERVERURLDOC; ?>PerfAlm/<?php echo base64_encode($alm); ?>/" class="btn text-primary bg-white rounded cardShadow mr-3 btn-md">
					<i class="fas fa-arrow-left icoIni"></i>
					Regresar
				</a>
			</div>
		</div>
	</div>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-4 col-lg-3">
				<!-- SobreMi -->
                <div class="container py-5">
                    <div class="card shDC">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">

                        <div class="text-center margen-avatar">
                        	<?php 
								if ($datDoce -> foto_perf_doc != "") {
							?>
								<div class="text-center">
									<img src="<?php echo SERVERURLDOC; ?>perfilFot/<?php echo $datDoce->foto_perf_doc; ?>" class="rounded-circle" width="100px" >
								</div>
								<hr style="height: 2px;" class="bg-success rounded">
							<?php
								} else {
							?>
								<img src='<?php echo SERVERURL; ?>vistas/img/usermal.png' class='rounded-circle' width='100px'>
							<?php
								}
							?>
                        </div>
                        <div class="card-body text-center">
                        <h6 class="card-title font-weight-bold">
                        	<?php echo $datDoce->nombre_c_doc; ?>
                        </h6>
                        <h6 class="text-left mt-3">
                        	<i class="fas fa-certificate fa-lg icoIni"></i>
                        	<?php echo $datDoce->especialidad_doc; ?>
                        </h6>
						<h6 class=" text-left mt-3 text-truncate" title="<?php echo $datDoce->correo_doc; ?>">
							<i class="fas fa-envelope fa-lg icoIni"></i>
							<?php echo $datDoce -> correo_doc; ?>
						</h6>
						<h6 class=" text-left mt-3">
							<i class="fas fa-phone fa-lg icoIni"></i>
							<?php echo $datDoce -> telefono_doc; ?>
						</h6>
						<hr class="bg-info mt-4" style="height: 2px;">
						<h6 class="text-center text-info">
							<b>Docente</b>
						</h6>
                        </div>
                    </div>
                </div><!-- SobreMi -->
                <div class="container">
                    <!-- Comentarios -->
                    <div class="card">
                        <div class="card-header text-center">
                            Frase Celebre
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p class="font-italic text-info">
                            	<b>"</b> Todo el mundo tiene talento, solo es cuestión de moverse hasta descubrirlo. <b>"</b>
                            </p>
                            <footer class="blockquote-footer"><cite title="Source Title">George Lucas</cite></footer>
                            </blockquote>
                        </div>
                    </div><!-- Comentarios -->
                </div>
			</div>
			<div class="col-md-8 col-lg-9">
				<div class="text-center bg-primary p-1" style="border-radius: 8px;">
					<h4 class="text-center text-white mt-3"> 
						Tutoría personalizada
					</h4>
				</div>
				<div class="row mt-5">
					<div class="col-sm-6">
						<h5 class="text-center text-primary">
							<span class="badge badge-info p-3">
								Alumno: <?php echo $datAlm->nombre_c_al; ?>
							</span>
						</h5>
					</div>
					<div class="col-sm-6">
						<h5 class="text-center text-primary">
							<span class="badge badge-info p-3">
								Fecha: <?php echo formatFech($datHist -> fecha_reg_obs); ?>
							</span>
						</h5>
					</div>
				</div>
				<div class="row bg-white text-primary cardShadow mt-5">
					<div class="col-sm-12">
						<h4 class="text-center mt-4">
							Prioridad de la tutoría :
							<?php 
								if ($datHist -> prioridad_tut == "Alta") {
									echo "<span class='text-white badge badge-pill font-weight-normal bg-danger text-capitalize'>
									".$datHist -> prioridad_tut."
									</span>";
								} else if ($datHist -> prioridad_tut == "Media") {
									echo "<span class='text-white badge badge-pill font-weight-normal bg-warning text-capitalize'>
									".$datHist -> prioridad_tut."
									</span>";
								} else if ($datHist -> prioridad_tut == "Baja") {
									echo "<span class='text-white badge badge-pill font-weight-normal bg-primary text-capitalize'>
									".$datHist -> prioridad_tut."
									</span>";
								}
							?>
						</h4>
					</div>
					<div class="col-sm-6 mt-5">
						<h4 class="text-center">
							Razones 
						</h4>
						<hr style="height: 2px;" class="bg-info mt-4 mb-4">
						<p class="lead bg-white text-primary rounded mt-3">
							<?php echo $datHist -> razones_tut; ?>
						</p>
					</div>
					<div class="col-sm-6 mt-5">
						<h4 class="text-center">
							Observaciones
						</h4>
						<hr style="height: 2px;" class="bg-info mt-4 mb-4">
						<p class="lead bg-white text-primary rounded mt-3">
							<?php 
								if ($datHist->observaciones_tut == "") {
									echo "Ninguna";
								} else {
									echo $datHist -> observaciones_tut;
								}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=================================================
	=            Ventana modal ver historial            =
	==================================================-->
	
	<div class="modal fade" id="almHist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title text-info" id="exampleModalLabel"><i class="fas fa-list fa-lg icoIni"></i>Listado tutorías personalizada</h5>
	        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<div class="row">
	          <div class="col-sm-12 table-responsive">
	          	<table width="700" class="table" id="tbListadoHistorial">
	          		<thead>
	          			<th>Cuatrimestre:</th>
	          			<th>Razones:</th>
	          			<th>Prioridad:</th>
	          			<th>Fecha registro:</th>
	          			<th>Acciones:</th>
	          		</thead>
	          		<tbody>
	          		</tbody>
	          		<tfoot>
	          			<th>Cuatrimestre:</th>
	          			<th>Razones:</th>
	          			<th>Prioridad:</th>
	          			<th>Fecha registro:</th>
	          			<th>Acciones:</th>
	          		</tfoot>
	          	</table>
	          </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" id="btnCloseHist" class="btn btn-outline-danger" data-dismiss="modal">
	        	<i class="fas fa-times-circle mr-2"></i>
	        	Cerrar</button>
	        <button type="submit" class="btn btn-outline-primary">
	        	<i class="fas fa-check-circle mr-2"></i>
	        	Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!--====  End of Ventana modal ver historial  ====-->

	<script src="<?php echo SERVERURLDOC; ?>doc/js/histAlm.js"></script>
<?php		
	} else {
		header("Location:".SERVERURLDOC."doc/Logout.php");
	}