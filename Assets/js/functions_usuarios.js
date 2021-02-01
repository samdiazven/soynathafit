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
const getUser = id => {
    const request = fetch(`${base_url}/Usuarios/getUserById/${id}`)
    .then(res => res.text())
    .then(res => JSON.parse(res))
    .then( res => {
        return res.data;
    });
    return request;
}
const editUser = async id => {
    const user = await getUser(id);
    document.querySelector('#idUser').value = "";
    document.querySelector('#btnModal').innerHTML = "Actualizar";
    document.querySelector('#titleModal').innerHTML = "Editar Usuario";
    document.querySelector('#btnForm').classList.replace('btn-primary', 'btn-info');
    document.querySelector('#name').value = user.name;
    document.querySelector('#email').value = user.email;
    document.querySelector('#role').value = user.role;

    $('#modalUsuarios').modal('show');
    const form = document.querySelector('#formUsuarios');
    form.addEventListener('submit', e => {
        e.preventDefault();
        const urlCreate = `${base_url}/Usuarios/updateUser/${id}`;
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
                $('#modalUsuarios').modal('hide');
                tablaUsuarios.api().ajax.reload();
            }
            else{
                swal('ERROR', objData.msg, "error");
            }
        });
    });
}

const addUser = () => {
    openModal();
    const form = document.querySelector('#formUsuarios');
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
                $('#modalUsuarios').modal('hide');
                tablaUsuarios.api().ajax.reload();
            }
            else{
                swal('ERROR', objData.msg, "error");
            }
        });
    });
}
const deleteUser = id => {
    swal({
        title: "Eliminar Usuario",
        text: "Realmente desea eliminar el Usuario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if(isConfirm)
        {
            fetch(`${base_url}/Usuarios/deleteUser/${id}`)
            .then( res => res.text())
            .then( res => JSON.parse(res))
            .then(data => {
                if(data.status)
                {
                    swal("Usuario", data.msg, "success");
                    tablaUsuarios.api().ajax.reload();
                }else{
                    swal("ERROR", data.msg, "error");
                }
            });
        }
    });
}
const viewUser =  async id => {
    const user = await getUser(id);
    document.querySelector('#nameUser').innerHTML = user.name;
    document.querySelector('#emailUser').innerHTML = user.email;
    document.querySelector('#enableUser').innerHTML = (user.enable == 1) ? 'Habilitado' : 'Inhabilitado';
    $('#viewUserMod').modal('show');
}