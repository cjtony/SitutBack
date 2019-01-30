
	
<div class="container animated fadeInUp delay-1s">
	<div class="row">
		<div class="col-sm-12">
			<a href="<?php echo SERVERURLCOR; ?>Reportes/" class="btn btn-md cardShadow bg-white text-primary">
				<i class="fas fa-book-open mr-2"></i> Reportes
			</a>
		</div>
	</div>
</div>

<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-md-4 col-lg-3 animated fadeInLeft delay-1s">
			<!-- SobreMi -->
            <div class="container py-5">
                <div class="card shDC">
                    <img class="card-img-top" src="<?php echo SERVERURL; ?>vistas/img/iceland.jpg" alt="Card image cap">
                    <div class="text-center margen-avatar">
                    	<?php 
							if ($datCor -> foto_perf_cor != "") {
								$nameImg = $datCor->foto_perf_cor;
						?>
							<img src='<?php echo SERVERURLCOR; ?>perfilFot/<?php echo $nameImg; ?>' class='rounded-circle' width='100px'>
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
                    	<?php echo $datCor -> nombre_c_cor; ?>
                    </h6>
					<h6 class=" text-left mt-3">
						<i class="fas fa-envelope fa-lg icoIni"></i>
						<?php echo $datCor -> correo_cor; ?>
					</h6>
					<h6 class=" text-left mt-3">
						<i class="fas fa-phone fa-lg icoIni"></i>
						<?php echo $datCor -> telefono_cor; ?>
					</h6>
					<hr class="bg-info mt-4" style="height: 2px;">
					<h6 class="text-center text-info">
						<b>Coordinador</b>
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
			<div class="text-center bg-primary p-1 animated fadeInDown" style="border-radius: 8px;">
				<h4 class="text-center text-white mt-3">Carreras y sus alumnos</h4>
			</div>
			<div class="row pad10 mt-3">
				<?php 
					$dbc = new Connect();
					$dbc = $dbc -> getDB();
					$valid = 1;
					$stmt = $dbc -> prepare("SELECT COUNT(alm.id_alumno) AS 'CantAlm', car.nombre_car, car.id_carrera FROM alumnos alm 
						INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
						INNER JOIN carreras car ON car.id_carrera = det.id_carrera
						WHERE alm.estado_al = :valid && alm.acept_grp = :valid GROUP BY car.nombre_car");
					$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
					$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
					$stmt -> execute();
					while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
				?>
				<div class="col-sm-12 col-md-6 col-lg-4 animated fadeInUp delay-1s">
					<div class="card pad10 cardShadow rounded">
						<div class=" card-body" title="<?php echo $res->nombre_car; ?>">
							<div class="card-title mb-4">
								<h5 class="text-center text-truncate">
									<?php echo $res->nombre_car; ?>
								</h5>
							</div>
							<hr style="height: 2px !important;" class="bg-info rounded">
							<div class="card-text mt-4">
								<h5 class="text-center">
									<i class="fas fa-users fa-lg icoIni text-info"></i>
									Alumnos : 
									<span class="font-weight-normal badge badge-pill badge-info">
										<?php echo $res->CantAlm; ?>	
									</span>	
								</h5>
							</div>
						</div>
						<div class="card-link text-right bg-white mt-0">
							<a href="<?php echo SERVERURLCOR; ?>DetCar/<?php echo base64_encode($res->id_carrera); ?>" class="bg-primary text-white badge-pill btn mt-2 mb-2 btn-sm"> 
								<i class="fas fa-plus fa-lg"></i>
							</a>
						</div>
					</div>
					<br>
				</div>
				<?php		
					}
				?>
				
			</div>
		</div>
	</div>
</div>

