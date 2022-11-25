const formC = document.querySelector('.citas form'); //A la variable le pono una S en mayuscual para identificarla como form de Signu.
const enviarC = formC.querySelector("#btnCitas");
const errorText = document.querySelector(".error-txt");
const successText = document.querySelector(".success-txt");

formC.onsubmit = (e)=>{
    e.preventDefault();
}

enviarC.onclick = () =>{
    //Iniciamos ajax
    let xhr = new XMLHttpRequest(); //Variable básica para la API XHR.
    xhr.open("POST","includes/citas.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){

                let data = xhr.response;
                
                if(data == "success"){
                    successText.style.display = "block";
                    successText.textContent = "¡Se ha enviado correctamente! Reinicia la página.";

                    setTimeout(resError, 5000);

                    function resError(){
                    successText.style.display = "none";
                    successText.textContent = "";
                    }
                }else{
                    errorText.style.display = "block";
                    errorText.style.color = "red";
                    errorText.textContent = data;

                    setTimeout(resError, 5000);

                    function resError(){
                    errorText.style.display = "none";
                    errorText.textContent = "";
                    }
                }
            }
        }
    }
    let formData = new FormData(formC);
    xhr.send(formData);//Enviamos la información a php.
}