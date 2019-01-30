<?php 


$dbc = new Connect();
$dbc = $dbc -> getDB();
$codigo = explode("/", $_GET['view']);
$valCar = $codigo[1];
$valCarDec = base64_decode($valCar);
$datCarSel = $cordinador -> datCarSel($valCarDec);
$keyCor = $_SESSION['keyCor'];
$datCor = $cordinador->userCorDet($keyCor);
$male = 'Masculino';
$fema = 'Femenino';
		
?>
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
							?>
								<img src='<?php echo SERVERURLCOR; ?>perfilFot/<?php echo $datCor->foto_perf_cor; ?>' class='rounded-circle' width='100px'>
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
				<div class="text-center bg-primary p-1 animated fadeIn" style="border-radius: 8px;">
					<h4 class="text-center text-white mt-3">Reportes de la carrera: <?php echo $datCarSel->nombre_car; ?></h4>
				</div>
				<div class="row mt-5 animated fadeInUp delay-1s">
					<div class="col-sm-6">
						<h5 class="font-weight-bold">Por sexo:</h5>
						<div class="mt-4 text-center">
							<a target="_blank" href="<?php echo SERVERURLCOR; ?>cor/ImpReport.php?v=<?php echo $valCar;?>&&vr=<?php echo base64_encode($male); ?>" class="btn btn-primary mr-2">
								<i class="fas fa-male"></i>
								Hombres
							</a>
							<a target="_blank" href="<?php echo SERVERURLCOR; ?>cor/ImpReport.php?v=<?php echo $valCar;?>&&vr=<?php echo base64_encode($fema); ?>" class="btn btn-primary">
								<i class="fas fa-female"></i>
								Mujeres
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript">
    	$(function(){
    		$(window).scroll(function() {
			  if ($("#menu1").offset().top > 56) {
			      $("#menu1").addClass("bg-info");
			  } else {
			      $("#menu1").removeClass("bg-info");
			  }
			});
			$(window).scroll(function(){
				if ($("#menu2").offset().top > 56) {
			      $("#menu2").addClass("bg-info");
			      $("#textLog").text("U T S E M");
			  } else {
			      $("#menu2").removeClass("bg-info");
			      $("#textLog").text("S I T U T");
			  }
			});
    	});
    </script>