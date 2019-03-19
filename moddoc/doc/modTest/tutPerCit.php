<div class="modal fade bgModal" id="citTut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h5 mb-0 text-gray-700" id="exampleModalLabel"><i class="fas text-gray-300 fa-list fa-lg icoIni mr-2"></i>Aceptar tutoria personalizada</h5>
        <button id="btnIcoCloseNCA" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="row" method="POST" id="formAceptTut" name="formAceptTut">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
          	<input type="hidden" name="id_tutpersonales" id="id_tutpersonales">
          	<div class="form-group">
          		<label for="citFech">Fecha de la cita:</label>
          		<input type="date" id="citFech" name="citFech" class="form-control">
          	</div>
          	<div class="form-group">
          		<label for="timCit">Hora de la cita:</label>
          		<input type="time" id="timCit" name="timCit" class="form-control">
          	</div>
          </div>
          <div class="col-sm-1"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCloseAceptTut" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success btn-sm" id="btnAceptTut">Guardar cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>