// esta parte es para cambiar de nombre o buscar los archivos:
document.addEventListener("change", (event) => {
    const fileInput = event.target.closest('.formulario').querySelector('.subir');
    const span = event.target.closest('.formulario').querySelector('.subir_nombre');

    // Verificar si el evento se originó desde el input
    if (fileInput && event.target === fileInput) {
        if (fileInput.files.length === 0) {
            span.innerHTML = 'Ningún Archivo Seleccionado';
        } else {
            span.innerHTML = fileInput.files[0].name;
        }
    }
});

//------------------------------------------popup1 para añadir 
const abrir_direc = document.getElementById("abrir_direc");
const popup1 = document.querySelector(".popup1");
const cerrar_popup1 = document.querySelector(".cerrar_popup1");
const popup_cont = document.querySelector(".popup_cont");

abrir_direc.addEventListener("click",()=>{
    popup1.classList.add("mostrar");
    popup_cont.classList.add("mostrar");
});
cerrar_popup1.addEventListener("click",()=>{
    popup1.classList.remove('mostrar');
    popup_cont.classList.remove("mostrar");
});



//-------------------------------------------popup2
const abrir_Ps = document.getElementById("abrir_Ps");
const popup2 = document.querySelector(".popup2");
const cerrar_popup2 = document.querySelector(".cerrar_popup2");
const popup_cont2 = document.querySelector(".popup_cont2");

abrir_Ps.addEventListener("click",()=>{
    popup2.classList.add("mostrar");
    popup_cont2.classList.add("mostrar");
});
cerrar_popup2.addEventListener("click",()=>{
    popup2.classList.remove('mostrar');
    popup_cont2.classList.remove("mostrar");
});

//--------------------------------------------popup3
const abrir_social = document.getElementById("abrir_social");
const popup3 = document.querySelector(".popup3");
const cerrar_popup3 = document.querySelector(".cerrar_popup3");
const popup_cont3 = document.querySelector(".popup_cont3");

abrir_social.addEventListener("click",()=>{
    popup3.classList.add("mostrar");
    popup_cont3.classList.add("mostrar");
});
cerrar_popup3.addEventListener("click",()=>{
    popup3.classList.remove('mostrar');
    popup_cont3.classList.remove("mostrar");
});


// Para el primer conjunto de elementos

class PopupManager {
    constructor(abrir, mostrar, cerrar, popup) {
      this.abrir = document.querySelectorAll(abrir);
      this.mostrar = document.querySelectorAll(mostrar);
      this.cerrar = document.querySelectorAll(cerrar);
      this.popup = document.querySelectorAll(popup);
    }
  
    agregarListeners() {
      this.abrir.forEach((modalAbrir, index) => {
        modalAbrir.addEventListener("click", () => {
          this.mostrar[index].classList.add("mostrar");
          this.popup[index].classList.add("mostrar");
        });
  
        this.cerrar[index].addEventListener("click", () => {
          this.mostrar[index].classList.remove("mostrar");
          this.popup[index].classList.remove("mostrar");
        });
      });
    }
  }
  
  // Para el primer conjunto de elementos
  const managerEdicion = new PopupManager(".abrir_edic", ".popup_edicion_cont", ".cerrar_popup_edicion", ".popup_edicion");
  managerEdicion.agregarListeners();

  //para el segundo conjunto de elementos
  const managerEdicionPsicologos = new PopupManager(".abrir_edic_psicologo", ".popup_edicion_cont_psicologo", ".cerrar_popup_edicion_psicologo", ".popup_edicion_psicologo");
  managerEdicionPsicologos.agregarListeners();
  //para el tercer conjunto de elementos
  const managerEdicionSocial = new PopupManager(".abrir_edic_social", ".popup_edicion_cont_social", ".cerrar_popup_edicion_social", ".popup_edicion_social");
  managerEdicionSocial.agregarListeners();
 

//----------------------------------------------------------------------------------
//----------------------------------------------------------------------------------
//para validar los campos del director en el directorio 
function validarCampos() {

  var nombre = document.getElementById("nombre").value;
  var profesion = document.getElementById("profesion").value;
  var Gmail = document.getElementById("Gmail").value;
  var telefono = document.getElementById("telefono").value;
  var descripcion = document.getElementById("descripcion").value;


  
  if (nombre.trim() === "") {
      alert("Termine de completar los campos en blanco'.");
      return false; // Retorna false para evitar que el formulario se envíe
  }
  if (profesion.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (Gmail.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (telefono.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (descripcion.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  // Si todos los campos están completos, puedes continuar con el envío del formulario
  return true;
}
//para validar los compados de los y medicos como psicologos validarCamposMedicos
function validarCamposMedicos() {

  var nombre2 = document.getElementById("nombre2").value;
  var profesion2 = document.getElementById("profesion2").value;
  var Gmail2 = document.getElementById("Gmail2").value;
  var telefono2 = document.getElementById("telefono2").value;
  var descripcion2 = document.getElementById("descripcion2").value;


  if (nombre2.trim() === "") {
      alert("Termine de completar los campos en blanco'.");
      return false; // Retorna false para evitar que el formulario se envíe
  }
  if (profesion2.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (Gmail2.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (telefono2.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (descripcion2.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  // Si todos los campos están completos, puedes continuar con el envío del formulario
  return true;
}



//para validar los campos del personal asistencial

function validarCamposSocial() {

  var nombre1 = document.getElementById("nombre1").value;
  var profesion1 = document.getElementById("profesion1").value;
  var Gmail1 = document.getElementById("Gmail1").value;
  var telefono1 = document.getElementById("telefono1").value;


  
  if (nombre1.trim() === "") {
      alert("Termine de completar los campos en blanco'.");
      return false; // Retorna false para evitar que el formulario se envíe
  }
  if (profesion1.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (Gmail1.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  if (telefono1.trim() === "") {
    alert("Termine de completar los campos en blanco'.");
    return false; // Retorna false para evitar que el formulario se envíe
  }
  // Si todos los campos están completos, puedes continuar con el envío del formulario
  return true;
}




  

