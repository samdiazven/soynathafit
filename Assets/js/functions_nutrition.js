var base_url = 'http://localhost/soynathafit';
/*PROTOTIPOS*/ 

function openModal(){
    document.querySelector('#idPrototype').value="";
    document.querySelector('#titleModal').innerHTML = "Agregar Prototipo";
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
            "url":" "+base_url+"/PrototypeN/obtenerPrototipos",
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


let formProto = document.querySelector('#formPrototype');
formProto.onsubmit = function(e) {
    e.preventDefault();
    let nameText = document.querySelector('#name').value;
    let descriptionText = document.querySelector('#description').value;
    if(nameText.trim() == "" || descriptionText.trim() == ""){
        swal("Error", "Todos los campos son obligatorios", "error");
    }

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let urlRequest = base_url+"/PrototypeN/setPrototype";
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
               tablaPrototipos.api().ajax.reload();
           }else{
               swal("Error", objData.msg, "error");
           }
       }
    }
}


const editPrototype = id => {
    document.querySelector('#titleModal').innerHTML = "Actualizar Ejercicio";
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxEditUrl = base_url+"/PrototypeN/getPrototype/"+id;
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
}

const deletePrototype = id => {
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
        fetch(`${base_url}/PrototypeN/deletePrototype/${id}`)
        .then(x => x.text())
        .then( res => JSON.parse(res))
        .then(objData => {
            if(objData.status)
            {
                swal('Eliminar', objData.msg, "success");
                tablaPrototipos.api().ajax.reload();
            }else{

                swal("Error", objData.msg, "error");
            }
        });
    }
});

}

/*USUARIOS*/ 
var tablaUsuarios;

$(document).ready(function() {
    tablaUsuarios = $('#tablaAddPrototype').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":" "+base_url+"/PrototypeN/getUsers",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": "proto"},
            {"data": "options"}
        ],
        "responsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
    $('#tablaAddPrototype').DataTable();
});

const getUser = id => {
    const request = fetch(`${base_url}/Usuarios/getUserById/${id}`)
    .then(res => res.text())
    .then(res => JSON.parse(res))
    .then( res => {
        return res.data;
    });
    return request;
}

const getData = id => {
    const request = fetch(`${base_url}/Client/getDataPersonal/${id}`)
    .then( res => res.text())
    // .then( res => console.log(res))
    .then( res => JSON.parse(res))
    .then( res => {
        return res.data;
    });
    return request;
}
const viewUser =  async id => {
    const user = await getUser(id);
    const data = await getData(id);
    document.querySelector('#nameUser').innerHTML = user.name;
    document.querySelector('#emailUser').innerHTML = user.email;
    document.querySelector('#enableUser').innerHTML = (user.enable == 1) ? 'Habilitado' : 'Inhabilitado';
    document.querySelector('#roleUser').innerHTML = (user.role == 1) ? 'Usuario' : 'Personal';
    if(data){
        document.querySelector('#peso').innerHTML = data.peso;
        document.querySelector('#altura').innerHTML = data.altura;
        document.querySelector('#edad').innerHTML = data.edad;
        document.querySelector('#cintura').innerHTML = data.perimetro_cintura;
        document.querySelector('#grasa').innerHTML = data.grasa;
        document.querySelector('#imc').innerHTML = data.imc;
        document.querySelector('#sexo').innerHTML = data.sexo;
        document.querySelector('#operaciones').innerHTML = data.operaciones;
        document.querySelector('#ultima-actividad').innerHTML = data.registro_actividad;
        document.querySelector('#alergias').innerHTML = data.alergias;
        document.querySelector('#patologias').innerHTML = data.patologia;
    }else {
        document.querySelector('#peso').innerHTML = "";
        document.querySelector('#altura').innerHTML = "";
        document.querySelector('#edad').innerHTML = "";
        document.querySelector('#cintura').innerHTML = "";
        document.querySelector('#grasa').innerHTML = "";
        document.querySelector('#imc').innerHTML = "";
        document.querySelector('#sexo').innerHTML = "";
        document.querySelector('#operaciones').innerHTML = "";
        document.querySelector('#ultima-actividad').innerHTML = "";
        document.querySelector('#alergias').innerHTML = "";
        document.querySelector('#patologias').innerHTML = "";
    }
    $('#viewUserMod').modal('show');
}

const addPrototype = async id => {
    const user = await getUser(id);
    document.querySelector('#title').innerHTML = user.name;
    document.querySelector('#idUser').value = user.id;
    let urlPrototypes = `${base_url}/PrototypeN/obtenerPrototipos`;
    let selectPrototypes = document.querySelector('#selectPrototype');
    let options;
    fetch(urlPrototypes)
    .then(res => res.text())
    .then(data => JSON.parse(data))
    .then(data => {
        data.map( x => {
            options += `<option value=${x.id}> ${x.name} </option>`;
        })
        selectPrototypes.innerHTML = options;
    });
    $('#addPrototypeMod').modal('show');

}

const form = document.querySelector('#formPrototype');

form.onsubmit = e => {
    e.preventDefault();
    const formData = new FormData(form);
    fetch(`${base_url}/Usuarios/addPrototypeNutrition`, {
        method: 'POST',
        body: formData
    })
    .then( res => res.text() )
    .then( res => JSON.parse(res) )
    .then( res => {
        const {msg, status} = res; 

        if(status) {
            swal('Prototipo', msg, 'success');
            tablaUsuarios.api().ajax.reload();
            $('#addPrototypeMod').modal('hide');
        }else {
            swal('Error', msg, "error");
        }
    });
}