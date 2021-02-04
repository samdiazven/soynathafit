var base_url = "http://localhost/soynathafit";

$(document).ready( function() {
    getDiets();
});

function openModal()
{
    $('#modalDiet').modal('show');
    let urlPrototypes = `${base_url}/PrototypeN/obtenerPrototipos`;
    let selectPrototypes = document.querySelector('#prototypeSelect');
    let options;
    fetch(urlPrototypes)
    .then(res => res.text())
    .then(data => JSON.parse(data))
    .then(data => {
        data.map( x => {
            options += `<option value=${x.id}> ${x.name} </option>`;
        });
        selectPrototypes.innerHTML = options;
    });
}

const form = document.getElementById('formDiet');
form.onsubmit = e => {
    e.preventDefault();
    const formData = new FormData(form);
    fetch(`${base_url}/Nutrition/addDiet`, {
        method: "POST",
        body: formData
    })
    .then( x => x.text())
    .then( res => JSON.parse(res))
    .then(res => {
        
        const {status, msg} = res;
        if(status)
        {
            swal("Bien", msg, 'success');
            getDiets();
            $('#modalDiet').modal('hide');
            form.reset();
        }else {
            swal('Error', msg, 'error');
        }
    });
}

const getDiets = () => {
    const ul = document.getElementById('ListDiet');
    let li = ''
    fetch(`${base_url}/Nutrition/getDiets`)
    .then(res => res.text())
    .then( res => JSON.parse(res))
    .then( res => {
        const {status, data, msg} = res;

        if(status) {
            data.map(dieta => {
                li += `
                <li class="nav-item" ><a class="nav-link btn btn-primary mr-2 ml-2 mt-1" onclick="selectDiet(${dieta.id});" >${dieta.name} - ${dieta.week}</a></li>
                `;
            })
        }else {
            li = "No hay datos para mostrar";
        }
        ul.innerHTML = li;
    });
}

const selectDiet = id => {
    const cardHeader = document.getElementById('cardHeader');
    const cardBody = document.getElementById('cardBody');
    fetch(`${base_url}/Nutrition/getDiet/${id}`)
    .then( res => res.text())
    .then( res => JSON.parse(res))
    .then( res => {
        const {data, msg, status, prototipo} = res;

        if(status) {
            cardHeader.innerHTML = `
            <div class="d-flex justify-content-between"> 
                <h3 class="text-center">${data.name} - Semana ${data.week}</h3>
                <button class="btn btn-danger" id="deleteRoutine" onclick="deleteRoutine(${data.id});"> <i class="fa fa-times"></i> </button>
            </div>
            `;
            cardBody.innerHTML = `
                <h5>Descripci&oacute;n </h5>
                <p> ${data.description} </p>
                <h5>Fecha de Creaci&oacute;n</h5>
                <p> ${data.date} </p>
                <h5>Prototipo</h5>
                <p>Nombre: <b>${prototipo.name}</b></p>
                <p>Descripci&oacute;n: <b>${prototipo.description}</b></p>
                <h5>Dieta</h5>
                <a class="btn btn-danger" href="${base_url}/Nutrition/downloadDiet/${data.file}"> <i class="fa fa-file"></i> </a>
            `;
            
        }else {
            swal("Error", msg, "error");
            cardHeader.innerHTML = '';
            cardBody.innerHTML = '';
        }
    });
}

const deleteRoutine = id => {
swal({
    title: "Eliminar Plan",
    text: "Realmente desea eliminar el Plan?",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "No, cancelar!",
    closeOnConfirm: false,
    closeOnCancel: true
},
function(isConfirm) {
    if(isConfirm){
        fetch(`${base_url}/Nutrition/deleteDiet/${id}`)
        .then(x => x.text())
        .then( res => JSON.parse(res))
        .then(objData => {
            if(objData.status)
            {
                const cardHeader = document.getElementById('cardHeader');
                const cardBody = document.getElementById('cardBody');
                cardHeader.innerHTML = "";
                cardBody.innerHTML = "";
                getDiets();
                swal('Eliminar', objData.msg, "success");
            }else{

                swal("Error", objData.msg, "error");
            }
        });
    }
});
}

const downloadDiet = file => {
    fetch(`${base_url}/Nutrition/downloadDiet/${file}`)
}