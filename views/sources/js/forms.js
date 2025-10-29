/*-------------------------------------------------
SCRIPT PARA VALIDACIÓN DE BOOTSTRAP (4-5)
-------------------------------------------------*/

// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

/*-------------------------------------------------
Expresiones Regulares
-------------------------------------------------*/
const EMAIL_REGEX = /^(?=.{1,254}$)(?=.{1,64}@)[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+[A-Za-z]{2,}$/;
const TEXTO_REGEX = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$/;
const PASSWORD_REGEX =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W_).{8,}$/;



/*-------------------------------------------------
validar formularios
-------------------------------------------------*/
  /** 
    Validación dinámica con mensajes personalizados
    * @param {Event} event - evento input, change, blur
    * @param {string} tipoValidacion - tipo de validación ('texto' | 'email' | 'password| | etc)
  */

function validarJs(event, tipoValidacion) {

    const input = event.target;
    const valor = (input.value || "").trim();

    //localiza el contenedor padre y el bloque de feedback
    const contenedor = input.closest(".form-group, .b-3, .form-floating, div") || input.parentElement;
    const feedback = contenedor ? contenedor.querySelector(".invalid-feedback") : null;

    let valido = false;
    let mensaje = "";

    switch (tipoValidacion){
      case "texto":
        valido = TEXTO_REGEX.test(valor);
        mensaje = valido ? "Válido" : "Solo letras y espacios (mínimo dos caracteres)."
        break;

      case "email":
        valido = EMAIL_REGEX.test(valor);
        mensaje = valido ? "Válido" : "Escribe un correo válido (ej. nombre@dominio.com)"
        break;

      case "password":
        valido = PASSWORD_REGEX.test(valor);
        mensaje = valido ? "Constraseña Válida" : "Debe tener al menos 8 caracteres, una minúscula, un número y un símbolo."
        break;
    }

    //aplicamos el mensaje y estado de validez
    input.setCustomValidity(valido ? "" : mensaje);
    if(feedback) feedback.textContent = mensaje;

    //pinta estados de bootstrap
    if(input.form) input.form.classList.add("was-validate");

}

/*-------------------------------------------------
Recordar email en el login
-------------------------------------------------*/
function recordarEmail(event){
  const emailInput = document.querySelector('[name=emailAdmin]');
  const rememberCheckbox = event?.target;

  if(!emailInput || !rememberCheckbox) return;

  const email = (emailInput.value || "").trim();

  if(rememberCheckbox.checked){
    //guardamos el email y el estado del chechbox si es válido
    if(EMAIL_REGEX.test(email)){
      localStorage.setItem("emailAdmin", email);
      localStorage.setItem("checked", "true");
    }else{
      rememberCheckbox.checked = false;
      localStorage.removeItem("emailAdmin");
      localStorage.removeItem("checked");
      emailInput.setCustomValidity("Correo inválido");
      if(emailInput.form) emailInput.form.classList.add("was-validated");
    }

  }else{
    localStorage.removeItem("emailAdmin");
    localStorage.removeItem("checked");
  }
}

/*-------------------------------------------------
Recuperar email en el login
-------------------------------------------------*/
function getEmail(){

  const emailInput = document.querySelector('[name=emailAdmin]');
  const rememberCheckbox = document.querySelector("#remember");

  if(!emailInput || !rememberCheckbox) return; //no es el login

  const emailStored = localStorage.getItem("emailAdmin");
  const rememberState = localStorage.getItem("checked") === "true";

  if(emailStored) emailInput.value = emailStored;
  rememberCheckbox.checked = rememberState;

  //validacion dinámica del campo email
  emailInput.addEventListener("input", (e)=> validarJs(e, "email"));
  emailInput.addEventListener("blur", (e)=> validarJs(e, "email"));

  //sincronizar storage solo si el correo es válido y "recordar" está activo
  emailInput.addEventListener("input", ()=>{
    const v = (emailInput.value || "").trim();
    if(rememberCheckbox.checked && EMAIL_REGEX.test(v)){
      localStorage.setItem("emailAdmin", v);
    }
  })

}

/*-------------------------------------------------
ejecutar al cargar el DOM
-------------------------------------------------*/
document.addEventListener("DOMContentLoaded",getEmail)