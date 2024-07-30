/*opcion para abrir los videos en un popup*/

const modalesAbrir = document.querySelectorAll(".abrir_video");
const modales = document.querySelectorAll(".modal");
const cerrarModales = document.querySelectorAll(".cerrar_video");
const video_expandido = document.querySelectorAll(".video_expandido");

modalesAbrir.forEach((modalAbrir, index) => {
    modalAbrir.addEventListener("click", () => {
        modales[index].classList.add("mostrar_video");
        video_expandido[index].classList.add("mostrar_video");
    });

    cerrarModales[index].addEventListener("click", () => {
        modales[index].classList.remove("mostrar_video");
        video_expandido[index].classList.remove("mostrar_video");
    });
});

//abrimos los demas modals que hay
//abrimos el driagrama de flujo de antencion
const abrir_flujograma = document.getElementById("abrir_flujograma");
const modal_flujograma = document.querySelector(".modal_flujograma");
const cerrar_modal_flujograma = document.querySelector(".cerrar_modal_flujograma");
const cont_modal_flujograma = document.querySelector(".cont_modal_flujograma");

abrir_flujograma.addEventListener("click",()=>{
    modal_flujograma.classList.add("mostrar");
    cont_modal_flujograma.classList.add("mostrar");
});
cerrar_modal_flujograma.addEventListener("click",()=>{
    modal_flujograma.classList.remove('mostrar');
    cont_modal_flujograma.classList.remove("mostrar");
});

//para abrir el madal de los enlaces institucionales
const abrir_enlaces = document.getElementById("abrir_enlaces");
const modal_enlaces = document.querySelector(".modal_enlaces");
const cerrar_modal_enlaces = document.querySelector(".cerrar_modal_enlaces");
const cont_modal_enlaces = document.querySelector(".cont_modal_enlaces");

abrir_enlaces.addEventListener("click",()=>{
    modal_enlaces.classList.add("mostrar");
    cont_modal_enlaces.classList.add("mostrar");
});
cerrar_modal_enlaces.addEventListener("click",()=>{
    modal_enlaces.classList.remove('mostrar');
    cont_modal_enlaces.classList.remove("mostrar");
});

//para abrir el horario de atenciones 
const abrir_horario = document.getElementById("abrir_horario");
const modal_horario = document.querySelector(".modal_horario");
const cerrar_modal_horario = document.querySelector(".cerrar_modal_horario");
const cont_modal_horario = document.querySelector(".cont_modal_horario");

abrir_horario.addEventListener("click",()=>{
    modal_horario.classList.add("mostrar");
    cont_modal_horario.classList.add("mostrar");
});
cerrar_modal_horario.addEventListener("click",()=>{
    modal_horario.classList.remove('mostrar');
    cont_modal_horario.classList.remove("mostrar");
});