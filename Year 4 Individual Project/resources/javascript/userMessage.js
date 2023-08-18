const searchBar = document.querySelector(".users .search input"), 
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .user-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active"); 
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    
    let xhr = new XMLHttpRequest(); //creating the XML Object
    xhr.open("POST", "methods/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
    let xhr = new XMLHttpRequest(); //creating the XML Object
    xhr.open("GET", "methods/users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){ 
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); //this function will run every 500ms