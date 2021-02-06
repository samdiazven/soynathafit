var base_url ="http://localhost/soynathafit";
var tablaUsuarios;

$(document).ready(function() {
    tablaUsuarios = $('#tablaAddPrototype').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":" "+base_url+"/Prototype/getUsers",
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
    let urlPrototypes = `${base_url}/Prototype/obtenerPrototipos`;
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
    fetch(`${base_url}/Usuarios/addPrototypeTrainer`, {
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