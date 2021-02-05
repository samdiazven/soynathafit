var base_url ="http://localhost/soynathafit";

const formLogin = document.querySelector('#form-login');
formLogin.onsubmit = e => {
    e.preventDefault();
    let email = document.querySelector('#email').value;
    let password = document.querySelector('#password').value;

    if(email.trim() === "" || password.trim() === "")
    {
        swal('Error', 'Todos los campos son obligatorios', 'error');
        return false;
    }
    let formData = new FormData(formLogin);
    fetch(`${base_url}/Auth/loginUser`, {
        method: "POST",
        body: formData
    })
    .then( res => res.text() )
    .then( res => JSON.parse(res))
    .then( res => {
        const {status, msg} = res;
        if(status) {
            window.location = `${base_url}/Dashboard/dashboard`;
        }else{
            swal('Error', msg, 'error');
            document.querySelector('#password').value = "";
        }
    })

}
