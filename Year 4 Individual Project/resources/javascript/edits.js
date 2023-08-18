const form = document.querySelector(".edit form"),
inputField = form.querySelector(".input-field"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //creating the XML Object
    xhr.open("POST", "methods/edit.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Your password has been updated!"){
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    inputField.value = "";
//                    location.href = "home2.php"
                    
                }else{
                    console.log(data);
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



//setInterval(()=>{
//    let xhr = new XMLHttpRequest(); //creating the XML Object
//    xhr.open("GET", "methods/editAdmin.php", true);
//    xhr.onload = ()=>{
//        if(xhr.readyState === XMLHttpRequest.DONE){
//            if(xhr.status === 200){
//                let data = xhr.response;
//                console.log(data);
//                if(!searchBar.classList.contains("active")){ 
//                    usersList.innerHTML = data;
//                }
//            }
//        }
//    }
//    xhr.send();
//}, 500); //this function will run every 500ms