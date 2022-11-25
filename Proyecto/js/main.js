const btnLogin = document.getElementById('login');
const btnCita = document.getElementsByClassName('cita');
const popup = document.getElementById('popupses');
const cerrar = document.getElementById('cerrar');

btnLogin.addEventListener("click",()=>{
    popup.classList.toggle("popflex");
    console.log("hola");
});

for(let i = 0; i < btnCita.length ; i++){//hay que acabar esto...
    btnCita[i].addEventListener("click",()=>{
        popup.classList.toggle("popflex");
        console.log("hola");
    });
}

cerrar.addEventListener("click",()=>{
    popup.classList.toggle("popflex");
    console.log("hola");
});