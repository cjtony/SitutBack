<?php 

$datCantDir = $director->cantDir();
$car_Dir = $datDirec->id_carrera;
$datCantGrp = $director->cantGrp($car_Dir);

?>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-4 col-lg-3">
				<!-- SobreMi -->
                <div class="container py-5">
                    <div class="card shDC">
                        <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">

                        <div class="text-center margen-avatar">
                        	<?php
								if ($datDirec -> foto_perf_dir != "") {
							?>
								<img src="<?php echo SERVERURLDIR; ?>perfilFot/<?php echo $datDirec->foto_perf_dir; ?>" class='rounded-circle' width='100px'>
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
                        	<?php echo $datDirec -> nombre_c_dir; ?>
                        </h6>
						<h6 class=" text-left mt-3">
							<i class="fas fa-envelope fa-lg icoIni"></i>
							<?php echo $datDirec -> correo_dir; ?>
						</h6>
						<h6 class=" text-left mt-3">
							<i class="fas fa-phone fa-lg icoIni"></i>
							<?php echo $datDirec -> telefono_dir; ?>
						</h6>
						<hr class="bg-info mt-4" style="height: 2px;">
						<h6 class="text-center text-info">
							<b>Director</b>
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
						<?php echo "Dirección de: ".$datDirec->nombre_car; ?>
					</h4>
				</div>
				<h5 class="text-center mt-4">
					<i class="fas text-info fa-user-times fa-lg icoIni"></i>
					Alumnos dados de baja
				</h5>
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table bg-white table-hover table-bordered rounded" id="tbListadoAlumnosBaj">
								<thead class="text-primary">
									<th>Nombre:</th>
									<th>Grupo:</th>
									<th>Tutor:</th>
									<th>Fecha Solicitud</th>
									<th>Acciones:</th>
								</thead>
								<tbody class="text-dark"></tbody>
								<tfoot class="text-primary">
									<th>Nombre:</th>
									<th>Grupo:</th>
									<th>Tutor:</th>
									<th>Fecha Solicitud</th>
									<th>Acciones:</th>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo SERVERURLDIR; ?>dir/js/bajAlm.js"></script>
