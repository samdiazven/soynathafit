function openModal()
{
    $('#modalRutinas').modal('show');
}

$(document).ready(function(){
    getRoutines();
});

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