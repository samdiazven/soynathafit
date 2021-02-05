var base_url = 'http://localhost/soynathafit';
$(document).ready(function(){
    getData();
});
const form = document.getElementById('formData');
form.onsubmit = e => {
    e.preventDefault();
    const formData = new FormData(form);
    fetch(`${base_url}/Client/addData`, {
        method: "POST",
        body: formData
    }).then( res => res.text())
    // .then(res => console.log(res))
    .then( res => JSON.parse(res))
    .then( res => {
        const {status, msg} = res;
        if(status) {
            swal("Bien", msg, 'success');
            getData();
        } else {
            swal('Error', msg, 'error');
        }
    });
}

const getData = () => {
    fetch(`${base_url}/Client/getData`)
    .then(res => res.text())
    .then(res => JSON.parse(res))
    .then( res => {
        const {data, status} = res;
        setValues(status, data);
    });
}
const setValues = (condition, data) => {
    if(condition)
    {
        document.getElementById('isModifiable').value = 'true';
        document.getElementById('idPD').value = data.idPD;
        document.getElementById('height').value = data.altura;
        document.getElementById('weight').value = data.peso;
        document.getElementById('gender').value = data.sexo;
        document.getElementById('patology').value = data.patologia;
        document.getElementById('operations').value = data.operaciones;
        document.getElementById('alergies').value = data.alergias;
        document.getElementById('waist').value = data.perimetro_cintura;
        document.getElementById('activity').value = data.registro_actividad;
        document.getElementById('age').value = data.edad;

    }else {
        document.getElementById('isModifiable').value = "false";
        document.getElementById('height').value ="";
        document.getElementById('weight').value = "";
        document.getElementById('gender').value = "";
        document.getElementById('patology').value = "";
        document.getElementById('height').value = "";
        document.getElementById('height').value = "";
        document.getElementById('height').value = "";

    }
   }