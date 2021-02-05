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

const viewUser =  async id => {
    const user = await getUser(id);
    document.querySelector('#nameUser').innerHTML = user.name;
    document.querySelector('#emailUser').innerHTML = user.email;
    document.querySelector('#enableUser').innerHTML = (user.enable == 1) ? 'Habilitado' : 'Inhabilitado';
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