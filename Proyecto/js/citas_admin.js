const formCA = document.querySelector('.citas form'); //A la variable le pono una S en mayuscual para identificarla como form de Signu.
const enviarCA = formCA.querySelector("#btnDelete");
const errorText = document.querySelector(".error-txt");
const successText = document.querySelector(".success-txt");

formCA.onsubmit = (e)=>{
    e.preventDefault();
}

enviarCA.onclick = () =>{
    //Iniciamos ajax
    let xhr = new XMLHttpRequest(); //Variable básica para la API XHR.
    xhr.open("POST","includes/delete.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){

                let data = xhr.response;
                
                if(data == "success"){
                    successText.style.display = "block";
                    successText.textContent = "¡Se ha eliminado correctamente!";

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
    let formData = new FormData(formCA);
    console.log(formData);
    xhr.send(formData);//Enviamos la información a php.
}