<!-- Modal -->
<div class="modal fade" id="addPrototypeMod" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPrototype" name="formPrototype">
                <input type="hidden" value="" id="idUser" name="idUser">
                <div class="form-group">
                    <label for="">Seleccionar Prototipo</label>
                    <select class="form-control" id="selectPrototype" name="idPrototype">
                        <option value="">----SELECCIONE UN EJERCICIO-----</option>
                    </select>
                </div>
                <input type="submit" value="AGREGAR" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>