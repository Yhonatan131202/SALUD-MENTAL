
//para abrir el modal de documentos y subir uno 
const abrir_direc = document.getElementById("abrir_modal");
const popup1 = document.querySelector(".modal_docs");
const cerrar_popup1 = document.querySelector(".cerrar_modal_docs");
const popup_cont = document.querySelector(".cont_modal_docs");

abrir_direc.addEventListener("click",()=>{
    popup1.classList.add("mostrar");
    popup_cont.classList.add("mostrar");
});
cerrar_popup1.addEventListener("click",()=>{
    popup1.classList.remove('mostrar');
    popup_cont.classList.remove("mostrar");
});

//para el cambio de nombre del formulario que esta en el popup
// esta parte es para cambiar de nombre o buscar los archivos:
document.addEventListener("change", (event) => {

    const fileInput = event.target.closest('.cont_modal_docs').querySelector('.subir');
    const span = event.target.closest('.cont_modal_docs').querySelector('.subir_nombre');

    // Verificar si el evento se originó desde el input
    if (fileInput && event.target === fileInput) {
        if (fileInput.files.length === 0) {
            span.innerHTML = 'Ningún Archivo Seleccionado';
        } else {
            span.innerHTML = fileInput.files[0].name;
        }
    }
});