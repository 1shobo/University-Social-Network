const form = document.querySelector(".index-login form"), 
continueBtn = form.querySelector(".button button"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //creating the XML Object
    xhr.open("POST", "methods/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success"){ // student credentials
                    location.href = "home2.php"
                }else if(data == "success admin"){ // admin credentials
                    location.href = "home.php"
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Sending form data through ajax to php
    let formData = new FormData(form); //creating new formData Object
    xhr.send(formData); //sending form data to php
}