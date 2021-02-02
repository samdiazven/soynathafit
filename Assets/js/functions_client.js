var base_url = 'http://localhost/soynathafit';
var enable = false;
const selectWeek = w => {
    fetch(`${base_url}/Client/getRoutine/${w}`)
    .then(res => res.text())
    .then( res => JSON.parse(res))
    .then( data => {
        if(data.status){
            enable = true;
            const {name, id, week, description} = data.data;
            document.querySelector('#titleRoutine').innerHTML = `${name} - Semana ${week}`;
            const day = Number(document.querySelector('#dayWeek').value);
            document.querySelector('#idRoutine').value = id;
            getDay(day);
            getExercises(id, day);
        }else {
            enable = false;
            document.querySelector('#titleRoutine').innerHTML = 'No tiene una rutina asignada aun';
            document.querySelector('#titleDay').innerHTML = "";
            document.querySelector('#listExercises').innerHTML = " <tr><td></td></tr>";
        }
    });
}

const getExercises = (idRoutine, day) => {
    if(!enable) return;
    fetch(`${base_url}/Rutinas/exercisesByRoutine/${idRoutine}/${day}`)
    .then( res => res.text())
    .then( res => JSON.parse(res))
    .then( res => {
        const {data} = res;
        const tbody = document.querySelector('#listExercises');
        let tr = "";
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
                    </tr>
                    `;
        });
        tbody.innerHTML = tr;
    });
}

const getDay = day => {
    if(!enable) return;
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
const changeDay = condition => {
    if(!enable) return;
    const idRoutine = document.querySelector('#idRoutine').value;
    let day = Number(document.querySelector('#dayWeek').value);
    if(condition === 'add'){
        if(day == 6){
            return false;
        }
        day = day + 1;
        document.querySelector('#dayWeek').value = day;
        getDay(day);
    }else if(condition === 'rest') {
        if (day == 0) {
            return false;
        }
        day = day - 1;
        document.querySelector('#dayWeek').value = day;
        getDay(day);
    }else {
        day = day;
    }
    getExercises(idRoutine, day);
}

const openVideo = url => {
    $('#modalVideo').modal('show');
    $('#modalVideo iframe').attr('src', url);

}