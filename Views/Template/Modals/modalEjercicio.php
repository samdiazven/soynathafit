<!-- Modal -->
<div class="modal fade" id="modalEjercicio" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addExerciseByRoutine">Nuevo Ejercicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
              <form id="formEjercicios" name="formEjercicios">
                  <input type="hidden" id="dayOfWeek" name="dayOfWeek" value="">
                  <input type="hidden" id="idRoutine" name="idRoutine" value="">
                <div class="form-group">
                    <label class="control-label">Ejercicio</label>
                    <select class="form-control" id="selectEjercicios" name="idEjercicio">
                        <option value="">----SELECCIONE UN EJERCICIO-----</option>
                    </select>
                
                </div>
                <div class="form-group">
                  <label class="control-label">Modo</label>
                  <input name="mode" type="text" id="mode" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Descripcion</label>
                  <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Dia</label>
                  <select name="day" id="weekSelect" class="form-control">
                    <option value="0">Lunes</option>
                    <option value="1">Martes </option>
                    <option value="2">Miercoles </option>
                    <option value="3">Jueves</option>
                    <option value="4">Viernes</option>
                    <option value="5">Sabado</option>
                  </select>
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