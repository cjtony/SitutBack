<?php 

$cod = explode("/", $_GET['view']);
$param1 = $cod[1];
$param2 = $cod[2];

?>

<div class="container-fluid animated fadeIn delay-1s">
	
	<?php 

		if ($param2 == 'adm') {
			$dataAdm = $devop -> obtDataAdm($param1);
	?>

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
		    <h1 class="h3 mb-0 text-gray-800">
		    	<i class="fas fa-user mr-2 text-primary"></i>
				<b><?php echo $dataAdm->nombre_c; ?></b>.
		    </h1>
		    <a href="<?php echo SERVERURLDEV; ?>Home/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
		      <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i> Regresar 
		    </a>
		</div>

		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
              	Administrador
              </h6>
            </div>
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?php echo SERVERURL; ?>assets/img/undraw_profile.svg" alt="info site">
              </div>
              <div class="row mt-4">
              	<div class="col-sm-4 mb-4">
              		<div class="list-group list-unstyled">
              			<li class="list-group-item-heading text-center font-weight-bold h5">
              				Información
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold">
              				Correo: <a href="mailto:"><?php echo $dataAdm->correo; ?></a>.
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold">
              				Usuario: <?php echo $dataAdm->usuario; ?>.
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold">
              				Permisos: <?php echo $dataAdm->privileg; ?>.
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold">
              				Registro: <?php echo formatFech($dataAdm->fecha_reg_adm); ?>.
              			</li>
              		</div>
              	</div>
              	<div class="col-sm-4 mb-4">
              		<div class="list-group list-unstyled">
              			<li class="list-group-item-heading text-center font-weight-bold h5">
              				Sistema
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold">
              				Cuenta: <?php if ($dataAdm->condicion == 1) {
              			?>
							<span class="badge badge-primary"><i class="fas fa-check mr-2"></i>Habilitada</span>
              			<?php
              				} else {
              			?>
							<span class="badge badge-primary"><i class="fas fa-check mr-2"></i>Inhabilitada</span>
              			<?php
              				} ?>
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold">
              				Reportes: <?php if ($dataAdm->us_mod_rep == 1) {
              			?>
							<span class="badge badge-primary"><i class="fas fa-check mr-2"></i>Habilitados</span>
              			<?php
              				} else {
              			?>
							<span class="badge badge-primary"><i class="fas fa-check mr-2"></i>Inhabilitados</span>
              			<?php
              				} ?>
              			</li>
              		</div>
              	</div>
              	<div class="col-sm-4 mb-4">
              		<div class="list-group list-unstyled">
              			<li class="list-group-item-heading text-center font-weight-bold h5">
              				Extra
              			</li>
              			<li class="list-group-item-primary mt-2 p-2 rounded font-weight-bold text-center">
              				<button class="btn btn-sm btn-primary" id="btnMost">
              					<i class="fas fa-key mr-2"></i>
              					Resetear contraseña
              				</button>
              			</li>
              		</div>
              		<form class="mt-4 mb-4 animated shadow rounded p-2 fadeOut d-none" id="formAdm">
              			<input type="hidden" value="<?php echo $dataAdm->id_admin; ?>" name="clv_adm">
              			<div class="text-right">
              				<i id="btnClos" style="cursor: pointer;" class="fas fa-times-circle text-danger fa-lg"></i>
              			</div>
              			<div class="form-group">
              				<label for="nuevpas" class="font-weight-bold form-control-label">Nueva contraseña</label>
              				<input type="password" class="form-control" id="nuevpas" name="nuevpas">
              			</div>
              			<div class="form-group">
              				<label for="passact" class="font-weight-bold text-primary form-control-label">Su contraseña</label>
              				<input type="password" class="form-control" id="passact" name="passact">
              			</div>
              			<div class="border-left-danger p-2 animated fadeOut rounded mt-3 mb-3 d-none" id="messErr">
              				<span class="font-weight-bold">
              					Ambos campos son requeridos...
              				</span>
              			</div>
              			<div class="text-center">
              				<button class="btn btn-sm btn-primary" id="btnEnvi">Aceptar</button>
              			</div>
              		</form>
              		<div class="text-center animated fadeOut d-none" id="loadAdm">
              			<div class="spinner-border m-4 text-primary" role="status">
						  	<span class="sr-only">Loading...</span>
						</div>
						<div>
							<span>Reseteando...</span>
						</div>
              		</div>
              		<div class="border-left-primary shadow card p-2 animated fadeOut rounded mt-3 mb-3 d-none" id="messGod">
          				<span class="font-weight-bold">
          					<i class="fas fa-check-circle text-primary mr-2"></i> Contraseña cambiada 
          				</span>
          			</div>
              	</div>
              </div>
            </div>
        </div>

        <script src="<?php echo SERVERURLDEV; ?>dev/js/conf/adm.js"></script>

	<?php
		} else if ($param2 == 'cor') {
	?>

	<?php
		} else if ($param2 == 'dir') {

		}

	?>

</div>