var base_url = 'http://localhost/soynathafit';
///RUTINAS/////
function openModal(){
    $('#modalRutinas').modal('show');
}
////EJERCICIOS/////

var tablaEjercicios;

document.addEventListener('DOMContentLoaded', function(){
    tablaEjercicios = $('#tablaEjercicios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":" "+base_url+"/Entrenador/obtenerEjercicios",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "description"},
            {"data": "uri"},
            {"data": "options"}
        ],
        "responsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });

    //Nuevo Ejercicio
    var formEjer = document.querySelector("#formEjercicio");
    formEjer.onsubmit = function(e) {
        e.preventDefault();
        var idEjercicio = document.querySelector('#idEjercicio').value;
        var name = document.querySelector('#name').value;
        var description = document.querySelector('#description').value;
        var uri = document.querySelector('#uri').value;
        if(name == '' || description == '' || uri == '')
        {
            swal("Atencion", "Todos los campos son Obligatorios", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = " "+base_url+"/Entrenador/setEjercicio";
        var formData = new FormData(formEjercicio);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalAgregarEjercicios').modal('hide');
                    formEjer.reset();
                    swal("Ejercicio", objData.msg, "success");
                    tablaEjercicios.api().ajax.reload(function () {
                        editEjer();
                        delEjer();
                    });
                    
                }else{
                    swal("ERROR", objData.msg, "error");
                }
            }
        }
    }
    $('#tablaEjercicios').DataTable();
});

function openModalCrearEjercicio()
{
    document.querySelector('#idEjercicio').value="";
    document.querySelector('#titleModal').innerHTML = "Agregar Ejercicio";
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formEjercicio').reset();
    $('#modalAgregarEjercicios').modal('show');
}

window.addEventListener('load', function() {
    editEjer();
    delEjer();
}, false);

function editEjer(){
 var btnEditEjer = document.querySelectorAll('.btnEditEjer');
    btnEditEjer.forEach(function(btnEditEjer){
        btnEditEjer.addEventListener('click', function() {
            document.querySelector('#titleModal').innerHTML = "Actualizar Ejercicio";
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idEjer = this.getAttribute('rel');
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxEditUrl = base_url+"/Entrenador/getEjercicio/"+idEjer;
            request.open('GET', ajaxEditUrl, true);
            request.send();

            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector('#idEjercicio').value = objData.data.id;
                        document.querySelector('#name').value = objData.data.name;
                        document.querySelector('#description').value = objData.data.description;
                        document.querySelector('#uri').value = objData.data.uri;
                    }else{
                        swal("Error", data.msg, "error");
                    }
                }
            }

            $('#modalAgregarEjercicios').modal('show');
        });
    });
}

function delEjer(){
 let btnDelEjer = document.querySelectorAll('.btnDelEjer');
 btnDelEjer.forEach(function(btnDelEjer){
        btnDelEjer.addEventListener('click', function(){
            let idEjer = this.getAttribute('rel');
            swal({
                title: "Eliminar Ejercicio",
                text: "Realmente desea eliminar el Ejercicio?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
                function(isConfirm) {
                    
                if(isConfirm)
                {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxDelUrl = base_url+"/Entrenador/delEjercicio/";
                    var strData = "idEjer="+idEjer;
                    request.open("POST", ajaxDelUrl, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function() {
                        if(request.readyState == 4 && request.status == 200){
                            var objData = JSON.parse(request.responseText);
                            console.log(objData);
                            if(objData.status){
                                swal("Eliminar!", objData.msg, "success");
                                tablaEjercicios.api().ajax.reload(function (){
                                editEjer();
                                delEjer(); 
                                });
                            }else{
                                swal("Atencion", objData.msg, "error");
                            }
                        }
                    }
                }
                
            });
        });
    });
}

