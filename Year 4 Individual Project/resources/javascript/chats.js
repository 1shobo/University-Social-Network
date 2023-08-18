const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".msg_btn"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //creating the XML Object
    xhr.open("POST", "methods/chatMessages.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // after message enterd into database, the input field will be empty
                scrollToBottom();                
            }
        }
    }
     // Sending form data through ajax to php
    let formData = new FormData(form); //creating new formData Object
    xhr.send(formData); //sending form data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest(); //creating the XML Object
    xhr.open("POST", "methods/getChatMessages.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){ 
                    scrollToBottom();
                }
            }
        }
    }
    
     // Sending form data through ajax to php
    let formData = new FormData(form); //creating new formData Object
    xhr.send(formData); //sending form data to php
}, 500); //this function will run every 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}