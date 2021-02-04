var base_url = "http://localhost/soynathafit";
$(document).ready(function(){
    getRoutines();
});
const selectRoutine = id => {
    let title = document.querySelector('#titleRoutine');
    let titleDay = document.querySelector('#titleDay');
    let day = Number(document.querySelector('#dayOfWeek').value);
    const urlRequest = `http://localhost/soynathafit/Rutinas/getRoutine/${id}`;
    fetch(urlRequest)
    .then(response => response.text())
    .then(data => JSON.parse(data))
    .then(data => {
        title.innerHTML = `${data.data.name} - Semana ${data.data.week}`;
        console.log(day);
        getNameDay(day);
        getExercises(id, day);
        document.querySelector('#btnAgregar').classList.replace('disabled', 'enabled');
        document.querySelector('#btnAgregar').value = id;
        document.querySelector('#dayOfweek').value = day;
        document.querySelector('#idRoutine').value = id;

    })
};

///Agregar Ejercicio
const addExercise = () => {
    let urlExercises = 'http://localhost/soynathafit/Entrenador/obtenerEjercicios';
    let btnValue = document.querySelector('#btnAgregar').value;
    let day = Number(document.querySelector('#dayOfWeek').value);
    let selectDay = document.querySelector('#daySelect').value = day;
    if(btnValue === 'disable') return;
    $('#modalEjercicio').modal('show');
    fetch(urlExercises)
    .then(res => res.text())
    .then(res => JSON.parse(res))
    .then(data => {
        const list = data.map(ejercicio => {
            return {
                id: ejercicio.id,
                text: ejercicio.name
        }});
        $('#selectEjercicios').select2({
            dropdownParent: $('#modalEjercicio'),
            data: list
        });
    });
    let formEjercicios = document.querySelector('#formEjercicios');   
    formEjercicios.addEventListener('submit', e => {
        e.preventDefault();
        const form = new FormData(formEjercicios);
        let urlCreateExercise = 'http://localhost/soynathafit/Rutinas/insertExercises';
        fetch(urlCreateExercise, {
            method: 'POST',
            body: form
        })
        .then(res => res.text())
        .then(res => JSON.parse(res))
        .then(data => {

            let dayOfWeek = document.querySelector('#dayOfweek').value;
            let idRoutine = document.querySelector('#idRoutine').value;
            if(data.status)
            {
                getExercises(idRoutine, dayOfWeek);
                formEjercicios.reset();
                swal("Ejercicio", data.msg, 'success');
            }else{
                swal("ERROR", data.msg, 'error');
            }
            $('#modalEjercicio').modal('hide');
        });
    });
    
}
////Obtener Ejercicios
const getExercises = (idRoutine, day) => {
    let urlExercises = `http://localhost/soynathafit/Rutinas/exercisesByRoutine/${idRoutine}/${day}`;
    let tr = "";
    const tbody = document.querySelector('#listExercises');
    fetch(urlExercises)
    .then(response => response.text())
    .then(res => JSON.parse(res))
    .then(response => {
        const {data} = response;
        if(!data) {
            tbody.innerHTML = `<tr><td>No hay Datos para mostrar</td> </tr>`;
            return;
        }
        data.map(exercise => {
            tr += ` <tr>
                    <td ><b>${exercise.name}</b></td>
                    <td >${exercise.description}</td>
                    <td>${exercise.mode}</td>
                    <td><button id="#btnVideo" onclick="openVideo('${exercise.uri}');" class="btn btn-success btn-sm">VER</button></td>
                    <td><button id="#btnDelete" onclick="deleteExercise(${exercise.idER});" class="btn btn-danger btn-sm">ELIMINAR</button></td>
                    </tr>
                    `;
        });
        tbody.innerHTML = tr;
    });
}
const openVideo = url => {
    console.log(url);
    $('#modalVideo').modal('show');
    $('#modalVideo iframe').attr('src', url);

}
const deleteExercise = id => {
    let dayOfWeek = document.querySelector('#dayOfweek').value 
    let routineId = document.querySelector('#idRoutine').value;

    let urlDelete = `http://localhost/soynathafit/Rutinas/deleteExercise/${id}`;
    swal({
        title: "Eliminar Ejercicio",
        text: "Realmente desea eliminar el Ejercicio?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if(isConfirm)
        {
            fetch(urlDelete)
            .then( res => res.text())
            .then( res => JSON.parse(res))
            .then(data => {
                if(data.status)
                {
                    getExercises(routineId, dayOfWeek);
                    swal("Ejercicio", data.msg, "success");
                }else{
                    swal("ERROR", data.msg, "error");
                }
            });
        }
    });
    
}


function openModal()
{
    $('#modalRutinas').modal('show');


    let urlPrototypes = "http://localhost/soynathafit/Prototype/obtenerPrototipos";
    let selectPrototypes = document.querySelector('#prototypeSelect');
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
}




function getRoutines(){
    let routines = document.querySelector('#nameRoutines')
    let url = "getRoutines";
    fetch(url).then(response => response.text()).then(data => JSON.parse(data)).then(data => {
        routines.innerHTML = `
        <ul class="nav nav-pills flex-column mail-nav" id="nameRoutines">
            ${data.map(x => {
                return x.content;
            })}
        </ul>`;
    });
}

///Agregar Rutina
let form = document.querySelector('#formRoutine');
form.addEventListener('submit', function(e){
    e.preventDefault();
    let data = new FormData(form);
    let urlCreate = "http://localhost/soynathafit/Rutinas/createRoutine";
    fetch(urlCreate, {
        method: 'POST',
        body: data
    })
    .then(response => response.text())
    .then(text => JSON.parse(text))
    .then(data => {
        if(data.status){
            swal("Rutina", data.msg, "success");
        }else{
            swal("Error", data.msg, "error");
        }
        getRoutines();
        $('#modalRutinas').modal('hide');
    });
});
////CHANGE DAY
const changeDay = condition => {
    let dayOfWeek = document.querySelector('#dayOfWeek');
    const idRoutine = document.querySelector('#idRoutine').value;
    let day = Number(dayOfWeek.value);
    if(day == 5){
        document.querySelector('#btnForward').classList.replace('enabled', 'disabled');
    }else{
        document.querySelector('#btnForward').classList.replace('disabled', 'enabled');
    }
    if(day == 1){
        document.querySelector('#btnBackward').classList.replace('enabled', 'disabled');
    } else{
        document.querySelector('#btnBackward').classList.replace('disabled', 'enabled');
    }
    if(condition === 'add'){
        if(day == 6) return;
        day = day + 1;
        getExercises(idRoutine, day);
        dayOfWeek.value = day;
        getNameDay(day);
    }else{
        if(day == 0) return;
        day = day -1;
        getExercises(idRoutine, day);
        dayOfWeek.value = day;
        getNameDay(day);
    }
}

const getNameDay = day => {
    let titleDay = document.querySelector('#titleDay');
    switch (day) {
        case 1:
            titleDay.innerHTML = 'Lunes';
            break;
        case 2:
            titleDay.innerHTML = 'Martes';
            break;
        case 3:
            titleDay.innerHTML = 'Miercoles';
            break;
        case 4:
            titleDay.innerHTML = 'Jueves';
            break;
        case 5:
            titleDay.innerHTML = 'Viernes';
            break;
        case 6:
            titleDay.innerHTML = 'Sabado';
            break;
        case 0:
            titleDay.innerHTML = 'Domingo';
        default:
            break;
    }
}
