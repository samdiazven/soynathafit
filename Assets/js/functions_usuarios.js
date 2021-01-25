const openModal = () => $('#modalUsuarios').modal('show');

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