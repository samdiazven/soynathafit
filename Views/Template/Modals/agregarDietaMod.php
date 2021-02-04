<!-- Modal -->
<div class="modal fade" id="modalDiet" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Plan Alimenticio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
              <form id="formDiet" name="formDiet" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" type="text" id="name" name="name" placeholder="Ingrese el nombre del Plan">
                </div>
                <div class="form-group">
                  <label class="control-label">Descripci&oacute;n</label>
                  <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Prototipo</label>
                  <select name="idPrototype" id="prototypeSelect" class="form-control">
                    <option value="0">----Seleccione una Opcion------</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Semana</label>
                  <select name="week" id="weekSelect" class="form-control">
                    <option value="1">Semana 1</option>
                    <option value="2">Semana 2</option>
                    <option value="3">Semana 3</option>
                    <option value="4">Semana 4</option>
                    <option value="5">Semana 5</option>
                    <option value="6">Semana 6</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Archivo</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-check-label">
                    <button class="btn btn-primary" type="submit">Guardar Datos</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
         </div>
      </div>
    </div>
  </div>
</div>