<!-- Modal -->
<div class="modal fade" id="modalAgregarEjercicios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Nuevo Ejercicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="formEjercicio" name="formEjercicio" >
    <input type="hidden" value="" name="idEjercicio" id="idEjercicio">
        <div class="modal-body">
            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Ingresar Nombre">
                </div>
                <div class="form-group">
                    <label class="control-label">Descripcion</label>
                    <textarea class="form-control" type="text" name="description" id="description" placeholder="Ingresar Descripcion" rows=4> </textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Url</label>
                    <input class="form-control" type="text" name="uri" id="uri" placeholder="Ingresar url">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnActionForm"> <span id="btnText">Guardar Datos</span> </button>
        </div>
    </form>
    </div>
  </div>
</div>