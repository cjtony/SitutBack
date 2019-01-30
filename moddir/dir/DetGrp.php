<?php 

	$datDirec = $director->userDirDet($keyDir);
	$codigo = explode("/", $_GET['view']);
	$valGrp = $codigo[1];
	$grpClv = base64_decode($valGrp);
	$car_Dir = $datDirec->id_carrera;
	$valCarGrp = $director -> valCarGrp($grpClv, $car_Dir);
	if ($valCarGrp -> CantVal == 1) {
		$datGrp = $director -> datGrpSel($grpClv);
		$cantAlm = $director -> cantAlmGrp($grpClv);
?>

<div class="container animated fadeInDown">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn bg-white text-primary cardShadow mr-3 btn-md" href="<?php echo SERVERURLDIR; ?>RegGrupos/">
					<i class="fas fa-arrow-left icoIni"></i>
					Regresar
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
						<?php echo "Dirección de: ".$datDirec->nombre_car; ?>
					</h4>
				</div>
				<div class="row mt-4 text-center animated fadeInDown">
					<div class="col-sm-2">
						<h5 class="text-info">
							Grupo: 
							<span class="badge badge-primary">
								<?php echo $datGrp->grupo_n; ?>
							</span>
						</h5>
					</div>
					<div class="col-sm-4">
						<h5 class="text-info">
							Alumnos en el grupo:
							<span class="badge badge-primary">
								<?php echo $cantAlm->CantAlm; ?>
							</span>
						</h5>
					</div>
					<div class="col-sm-6">
						<h5>
							Tutor: 
							<span class="badge badge-primary">
								<a class="text-white" href="PerfDoc.php?v=<?php echo base64_encode($datGrp->id_docente); ?>">
									<?php echo $datGrp -> nombre_c_doc; ?>
								</a> 
							</span>		
						</h5>
					</div>
				</div>
				<div class="row mt-4 animated fadeInUp delay-1s">
					<div class="col-sm-12 table-responsive">
						<table id="tableAlm" class="table bg-white table-hover table-bordered" id="tbListadoAlumnosGrp">
							<thead class="text-primary">
								<th>Nombre:</th>
								<th>Accion:</th>
							</thead>
							<tbody class="text-dark">
								<?php 
									$dbc = new Connect();
									$dbc = $dbc -> getDB();
									$valid = 1;
									$stmt = $dbc -> prepare("SELECT * FROM alumnos alm 
									INNER JOIN det_grupo det ON det.id_detgrupo = alm.id_detgrupo
									INNER JOIN carreras car ON car.id_carrera = det.id_carrera
									WHERE alm.acept_grp = :valid && alm.estado_al = :valid && det.id_detgrupo = :grpClv && car.id_carrera = :car_Dir");
									$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
									$stmt -> bindParam("valid", $valid, PDO::PARAM_INT);
									$stmt -> bindParam("grpClv", $grpClv, PDO::PARAM_INT);
									$stmt -> bindParam("car_Dir", $car_Dir, PDO::PARAM_INT);
									$stmt -> execute();
									while ($res = $stmt -> fetch(PDO::FETCH_OBJ)) {
								?>
									<tr>
										<td><?php echo $res->nombre_c_al; ?></td>
										<td>
											<a class="btn btn-primary btn-sm" href="<?php echo SERVERURLDIR; ?>PerfAlm/<?php echo base64_encode($res->id_alumno); ?>/<?php echo base64_encode($grpClv); ?>/">
												<i class="fas fa-eye"></i>
												Perfil
											</a>
										</td>
									</tr>
								<?php
									}
									$dbc = null; $stmt = null;
								?>
							</tbody>
							<tfoot class="text-primary">
								<th>Nombre:</th>
								<th>Accion:</th>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo SERVERURLDIR; ?>dir/js/almInact.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#tableAlm').DataTable();
		});
	</script>

<?php
	} else {
		header("Location:".SERVERURLDIR."dir/Logout.php");
	}	

?>