const formS = document.querySelector('.signup form'); //A la variable le pono una S en mayuscual para identificarla como form de Signu.
const enviarS = formS.querySelector(".btnSignup");
const errorText = formS.querySelector(".error-txt");

formS.onsubmit = (e)=>{
    e.preventDefault();
}

enviarS.onclick = () =>{
    //Iniciamos ajax
    let xhr = new XMLHttpRequest(); //Variable básica para la API XHR.
    xhr.open("POST","includes/signup.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                
                let data = xhr.response;

                if(data == "success"){
                    errorText.textContent = "success";
                }else{
                    errorText.style.display = "block";
                    errorText.style.color = "red";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(formS);
    xhr.send(formData);//Enviamos la información a php.
}