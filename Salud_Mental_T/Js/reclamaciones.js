
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

    //esta parte pertenece a las reclamaciones que se van registrando
    const managerReclamaciones = new PopupManager(".abrir_reclamo", ".popup_reclamo", ".cerrar_popup_reclamo", ".cont_popup_reclamo");
    managerReclamaciones.agregarListeners();