
	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-4 col-lg-3 animated fadeInLeft delay-1s">
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
				<div class="text-center bg-primary p-1 animated fadeIn" style="border-radius: 8px;">
					<h4 class="text-center text-white mt-3"> 
						! Bienvenido Director de <b><?php echo $datDirec->nombre_car; ?> </b>¡
					</h4>
				</div>
				<div class="row mt-5 animated fadeInDown delay-1s">
					<div class="col-sm-4">
						<h5 class="text-center mt-2">
							Alumnos totales: 
							<span class="ml-2 badge badge-pill font-weight-normal badge-info" id="cantAlmCar">
								Cargando...
							</span>
						</h5>
					</div>
					<div class="col-sm-4">
						<h5 class="text-center mt-2">
							Grupos totales:
							<span class="ml-2 badge badge-pill font-weight-normal badge-info" id="cantGrpCar">
								Cargando...
							</span>
						</h5>
					</div>
					<div class="col-sm-4 text-center">
						<a href="<?php echo SERVERURLDIR; ?>dir/RegAlumnos.php" class="btn btn-outline-primary">
							<i class="fas fa-plus mr-2"></i>
							Alumnos
						</a>
					</div>
				</div>
				<div class="row pad30 mt-3 animated fadeInUp delay-1s">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="card cardShadow bg-white text-primary mb-3 text-center rounded">
							<div class="card-header bg-info text-white border-light">
							  	<h5>Grupos</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 border-right border-info">
										<a href="<?php echo SERVERURLDIR; ?>RegGrupos/" class="btn btn-outline-primary rounded btn-md"> <i class="fas fa-plus icoIni"></i> Detalles </a>
									</div>
									<div class="col-sm-6">
										<button type="button" class="btn bg-white font-weight-bold text-primary cardShadow btn-md">
										  Registros <span class="ml-2 badge badge-info font-weight-normal"><?php echo $datCantGrp->CantidadGrp; ?></span>
										  <span class="sr-only">Registros</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="card cardShadow text-white mb-3 text-center rounded">
							<div class="card-header bg-info text-white border-light">
							  	<h5>Tutores</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 border-right border-info">
										<a href="<?php echo SERVERURLDIR; ?>RegTutores/" class="btn btn-outline-primary rounded btn-md"> <i class="fas fa-plus icoIni"></i> Detalles </a>	
									</div>
									<div class="col-sm-6">
										<button type="button" class="btn bg-white text-primary font-weight-bold cardShadow btn-md">
										  Rgistros <span class="ml-2 badge badge-info font-weight-normal"><?php echo $datCantDir->CantidadDir; ?></span>
										  <span class="sr-only">Registros</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="card cardShadow bg-white text-success mb-3 text-center rounded">
							<div class="card-header bg-info text-white border-light">
							  	<h5>Bajas carrera</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 border-right border-info">
										<a href="<?php echo SERVERURLDIR; ?>BajCar/" class="btn btn-outline-primary cardShadow rounded btn-md"> <i class="fas fa-plus icoIni"></i> Detalles </a>	
									</div>
									<div class="col-sm-6">
										<button type="button" class="btn bg-white font-weight-bold text-primary cardShadow btn-md">
										  Rgistros <span class="ml-2 badge badge-info font-weight-normal"><?php echo $cantBaj->CantBaj; ?></span>
										  <span class="sr-only">Registros</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="card cardShadow bg-white text-primary mb-3 text-center rounded">
							<div class="card-header bg-info text-white border-light">
							  	<h5>Alumnos inactivos</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6 border-right border-info">
										<a href="<?php echo SERVERURLDIR; ?>AlmInact/" class="btn btn-outline-primary cardShadow rounded btn-md"> <i class="fas fa-plus icoIni"></i> Detalles </a>	
									</div>
									<div class="col-sm-6">
										<button type="button" class="btn bg-white text-primary font-weight-bold cardShadow btn-md">
										  Rgistros <span class="badge badge-info ml-2 font-weight-normal"><?php echo $cantInact->CantInact; ?></span>
										  <span class="sr-only">Registros</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo SERVERURLDIR; ?>dir/js/notifInd.js"></script>
