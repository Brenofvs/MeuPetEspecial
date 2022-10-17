/*Animação Hamburguer*/
const hamburguer = document.getElementById("hamburguer");
const menu = document.getElementById("links-menu");

hamburguer.addEventListener("click", () => {
    hamburguer.classList.toggle("hamburguer-active")
    menu.classList.toggle("links-active")
})