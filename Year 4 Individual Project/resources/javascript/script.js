let menu = document.querySelector('.ri-menu-line');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    console.log("Hello");
    menu.classList.toggle('bx-a');
    navbar.classList.toggle('open');
}