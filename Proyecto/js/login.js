const formL = document.querySelector(".login form");
const enviarL = formL.querySelector("#btnLogin");
const errorText = formL.querySelector(".error-txt");

formL.onsubmit = (e)=>{
    e.preventDefault();
}

enviarL.onclick = () => {
    //Iniciamos ajax
    let xhr = new XMLHttpRequest(); //Variable básica para la API XHR.
    xhr.open("POST","includes/login.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){

                let data = xhr.response;
                
                if(data == "success"){

                    // console.log("conectado");
                    
                }else{
                    errorText.style.display = "block";
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
    let formData = new FormData(formL);
    xhr.send(formData);//Enviamos la información a php.
}