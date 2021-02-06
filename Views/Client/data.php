<?php
    headerAdmin($data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
        <h1><i class="fa fa-id-card"></i> Informaci&oacute;n Personal  
        </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Plan Alimentic&iacute;o</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="clearix"></div>
        <div class="col-md-12">
            <div class="tile">
            <h3 class="tile-title">Datos</h3>
            <div class="tile-body">
                <!-- 3 FILAS -->
                <form id="formData" name="formData" class="row">
                <input type="hidden" name="isModifiable" value="" id="isModifiable">
                <input type="hidden" name="idPD" value="" id="idPD">
                <div class="form-group col-md-4">
                    <label class="control-label">Altura</label>
                    <input class="form-control" type="number" step="0.01" placeholder="Ingresa tu altura" name="height" id="height">
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Peso</label>
                    <input class="form-control" type="number" step="0.01" placeholder="Ingresa tu peso: Kg" name="weight" id="weight">
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="control-label">G&eacute;nero</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">---SELECCIONE UNA OPCION---</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>
                </div>
                <!-- 3 FILAS -->
                <div class="form-group col-md-4">
                    <label class="control-label">Edad</label>
                    <input class="form-control" type="number" placeholder="Ingresa tu edad" name="age" id="age">
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Medida de Cintura</label>
                    <input class="form-control" type="number" step="0.01" placeholder="Necesario para medir el % de Grasa" name="waist" id="waist">
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="control-label">Ultima vez de actividad fisica </label>
                    <select name="activity" id="activity" class="form-control">
                        <option value="">---SELECCIONE UNA OPCION---</option>
                        <option value="Constantemente">Constantemente</option>
                        <option value="Menos de 3 meses">Hace menos de 3 meses</option>
                        <option value="Mas de 3 meses">Hace mas de 3 meses</option>
                        <option value="Mas de 12 meses">Hace mas de 1 a&ntilde;o</option>
                        <option value="Nunca">Nunca</option>
                    </select>
                </div>
                <!-- 3 FILAS -->
                <div class="form-group col-md-4">
                    <label for="" class="control-label">Patologias</label>
                    <textarea name="patology" id="patology" cols="4" class="form-control" placeholder="Ingrese sus Patologias" ></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="control-label">Operaciones</label>
                    <textarea name="operations" id="operations" cols="4" class="form-control" placeholder="Ingrese si alguna vez lo han operado" ></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="" class="control-label">Alergias y Gustos en Alimentos</label>
                    <textarea name="alergies" id="alergies" cols="4" class="form-control" placeholder="Ingrese sus Alergias y gustos alimenticios" ></textarea>
                </div>
                <div class="form-group col-md-6">
                    <input type="submit" class="btn btn-success" value="Grabar Datos">
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>