const openModal = () => {
    document.querySelector('#idUser').value = "";
    document.querySelector('#btnModal').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#btnForm').classList.replace('btn-info', 'btn-primary');
    document.querySelector('#formUsuarios').reset();
    $('#modalUsuarios').modal('show');
}

var tablaUsuarios;
$(document).ready(function() {
    tablaUsuarios = $('#tablaUsuarios').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":" "+base_url+"/Usuarios/getUsuarios",
            "dataSrc": ""
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": "enable"},
            {"data": "role"},
            {"data": "options"}
        ],
        "responsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
    $('#tablaUsuarios').DataTable();
});

const editUser = id => console.log(id);

const addUser = () => {
    openModal();
    const form = document.getElementById('#formUsuario');
    form.addEventListener('submit', e => {
        e.preventDefault();
        const urlCreate = `${base_url}/Usuarios/createUser`;
        const formData = new FormData(form);
        fetch(urlCreate, {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(res => JSON.parse(res))
        .then(objData => {
            if(objData.status)
            {
                swal('Usuario', objData.msg, 'success');
                tablaUsuarios.api().ajax.reload();
            }
            else{
                swal('ERROR', objData.msg, "error");
            }
        });
    });
}