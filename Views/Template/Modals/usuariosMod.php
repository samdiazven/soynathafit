<!-- Modal -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
          <form id="formUsuarios" name="formUsuarios">
              <input type="hidden" id="idUser" name="idUser" value="">
              <div class="form-group">
                  <label class="control-label">Nombre Completo</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese Nombre">               
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input name="email" type="email" id="email" class="form-control" placeholder="Ingrese Email de Usuario">
              </div>
              <div class="form-group">
                <label class="control-label">Habilitar</label>
              <div class="toggle">
                <label>
                  <input type="checkbox" value="1" id="enable" name="enable"><span class="button-indecator"></span>
                </label>
              </div>
              </div>
              <div class="form-group">
                <label class="control-label">Rol</label>
                <select name="role" id="role" class="form-control">
                  <option value="1">Cliente </option>
                  <option value="2">Entrenador </option>
                  <option value="3">Nutricionista</option>
                  <option value="4">Administrador</option>
                </select>
              </div>
              
              <div class="form-group">
                  <label class="form-check-label">
                  <button class="btn btn-primary" type="submit" id="btnForm"><span id="btnModal">Guardar Datos</span></button>
                  <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>