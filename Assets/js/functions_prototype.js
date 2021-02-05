var base_url = 'http://localhost/soynathafit';
function openModal(){
    document.querySelector('#idPrototype').value="";
    document.querySelector('#titleModal').innerHTML = "Agregar Ejercicio";
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formPrototype').reset();
    $('#modalPrototype').modal('show');
}

var tablaPrototipos;

$(document).ready(function () {
    tablaPrototipos = $('#tablaPrototipos').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":" "+base_url+"/Prototype/obtenerPrototipos",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "description"},
            {"data": "options"}
        ],
        "responsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
    $('#tablaPrototipos').DataTable();
});

///Crear Prototipo
let formProto = document.querySelector('#formPrototype');
formProto.onsubmit = function(e) {
    e.preventDefault();
    let idInt = document.querySelectorAll('#idPrototype').value;
    let nameText = document.querySelector('#name').value;
    let descriptionText = document.querySelector('#description').value;
    if(nameText.trim() == "" || descriptionText.trim() == ""){
        swal("Error", "Todos los campos son obligatorios", "error");
    }

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlRequest = base_url+"/Prototype/setPrototype";
    let formData = new FormData(formProto);
    request.open("POST", urlRequest, true);
    request.send(formData);
    request.onreadystatechange = function() {
       if(request.readyState == 4 && request.status == 200) 
       {
           let objData = JSON.parse(request.responseText);
           if(objData){
               $('#modalPrototype').modal('hide');
               formProto.reset();
               swal('Prototipo', objData.msg, "success");
               tablaPrototipos.api().ajax.reload(function(){
                    editPrototype();
                    delPrototype();
               });
           }else{
               swal("Error", objData.msg, "error");
           }
       }
    }
}
window.addEventListener('load', function(){
    editPrototype();
    delPrototype();
});

//Editar
function editPrototype(){
    let betnEditAll = document.querySelectorAll('.btnEdit');
    betnEditAll.forEach(function(btnEdit){
        btnEdit.addEventListener('click', function(){
            document.querySelector('#titleModal').innerHTML = "Actualizar Ejercicio";
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var id= this.getAttribute('rel');
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxEditUrl = base_url+"/Prototype/getPrototype/"+id;
            request.open('GET', ajaxEditUrl, true);
            request.send();
            request.onreadystatechange = function () {
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status){
                        document.querySelector('#idPrototype').value = objData.data.id;
                        document.querySelector('#name').value = objData.data.name;
                        document.querySelector('#description').value = objData.data.description;

                    }else{
                        swal("Error", objData.msg, "Hubo un error");
                    }
                }
            }
            $('#modalPrototype').modal('show');
        });
    });
}
function delPrototype () {
    let btnDelAll = document.querySelectorAll('.btnDel');
    btnDelAll.forEach(function(btnDel){
        btnDel.addEventListener('click', function(){
            let id = this.getAttribute('rel');
            swal({
                title: "Eliminar Prototipo",
                text: "Realmente desea eliminar el Prototipo?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if(isConfirm){
                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxDelUrl = base_url+'/Prototype/deletePrototype';
                    let strData = "id="+id;
                    request.open("POST", ajaxDelUrl, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function(){
                        if(request.readyState == 4 && request.status == 200){

                            let objData = JSON.parse(request.responseText);   
                            swal('Eliminar', objData.msg, "success");
                            tablaPrototipos.api().ajax.reload(function(){
                                delPrototype();
                                editPrototype();
                            });
                        }else{
                            swal("Error", objData.msg, "error");
                        }

                    }
                }
                
            });
        });
    });   
}