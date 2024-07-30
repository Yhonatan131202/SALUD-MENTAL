//este archivo funciona para subir los videos nada mas


//funcion del popup para abrir cerrar y disminucion de barra lateral
const popup_abrir = document.getElementById("miPopup_abrir");
const popup = document.querySelector(".popup");
const cerrar_popup = document.querySelector(".cerrar_popup");
const popup_formulario = document.querySelector(".popup_formulario");
const formulario2 = document.querySelector(".formulario2");

popup_abrir.addEventListener("click",()=>{
    popup.classList.add("mostrar");
    popup_formulario.classList.add("mostrar");
    
    document.getElementById("titulo").value = "";
    document.getElementById("url").value = "";

});

cerrar_popup.addEventListener("click",()=>{
    popup.classList.remove('mostrar');
    popup_formulario.classList.remove("mostrar");
});


/*para validar los datos*/
function validarCampos() {
    var tituloInput = document.getElementById("titulo").value;
    var urlInput = document.getElementById("url").value;

    if (tituloInput.trim() === "" && (urlInput.trim() === "" || urlInput.trim() === "URL* ")) {
        alert("Por favor completa los campos predeterminados.");
        return false; // Retorna false para evitar que el formulario se envíe
    }

    if (tituloInput.trim() === "") {
        alert("Por favor completa el campo 'Titulo del Video'.");
        return false; // Retorna false para evitar que el formulario se envíe
    }

    if (urlInput.trim() === "" || urlInput.trim() === "URL* ") {
        alert("Por favor completa el campo 'Ingresar URL'.");
        return false; // Retorna false para evitar que el formulario se envíe
    }
    
    
    if (urlInput.includes("https://www.youtube.com/")) {
                return true; // La URL es válida, se enviará el formulario
            } else {
                // La URL no es válida, mostrar una alerta
                alert("El formato de la URL no es correcto");
                return false; // Evitar que se envíe el formulario
            }


    // Si todos los campos están completos, puedes continuar con el envío del formulario
    return true;
}
