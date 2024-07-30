
const abrir = document.getElementById("abrir");
const barralateral = document.querySelector(".barra_lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const prendido = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const contenido = document.querySelector(".contenido");


menu.addEventListener("click",()=>{
    barralateral.classList.toggle("max_barra_lateral");
    if(barralateral.classList.contains("max_barra_lateral")){
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else{
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if(window.innerWidth<=400){
        barralateral.classList.add("mini_barra_lateral");
        contenido.classList.add("min_main");
        spans.forEach((span)=>{
            span.classList.add("oculto");
        })
    }
});

abrir.addEventListener("click",()=>{
    barralateral.classList.toggle("mini_barra_lateral");
    contenido.classList.toggle("min_main");
    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});