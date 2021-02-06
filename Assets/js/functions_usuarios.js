var base_url = 'http://localhost/soynathafit';
 openModal = () => {
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
        let email = document.querySelector('#email').value;
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
                sendMail(email, objData.pass);
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

const sendMail = (emailText, password) => {
    fetch(`${base_url}/Mail/sendMail/${emailText}/${password}`)
    .then(x => console.log('Enviado'))
    .catch(e => console.log(`Hubo un error ${e}`));
}