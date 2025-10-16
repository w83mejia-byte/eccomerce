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
validar formularios
-------------------------------------------------*/
function validarJs(campo, tipoValidacion) {
    if (tipoValidacion === "email") {
        let patron = /^(?=.{1,254}$)(?=.{1,64}@)[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+[A-Za-z]{2,}$/;

        if (!patron.test((campo.target.value || '').trim())) {
            $(campo.target).parent().addClass("was-validated");
            $(campo.target).parent().children(".invalid-feedback")
                .text("El correo electrónico está mal escrito");
            return;
        } else {
            $(campo.target).parent().removeClass("was-validated");
            $(campo.target).parent().children(".invalid-feedback").text("");
        }
    }

    // if (tipoValidacion === "password") {
    //     let patron = /^(?=.{1,254}$)(?=.{1,64}@)[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+[A-Za-z]{2,}$/;

    //     if (!patron.test((campo.target.value || '').trim())) {
    //         $(campo.target).parent().addClass("was-validated");
    //         $(campo.target).parent().children(".invalid-feedback")
    //             .text("El correo electrónico está mal escrito");
    //         return;
    //     } else {
    //         $(campo.target).parent().removeClass("was-validated");
    //         $(campo.target).parent().children(".invalid-feedback").text("");
    //     }
    // }
}

/*-------------------------------------------------
Recordar email en el login
-------------------------------------------------*/
function recordarEmail(event){
  const emailInput = document.querySelector('[name=emailAdmin]');
  const rememberCheckbox = event.target;

  if(rememberCheckbox.checked){
    //guardamos el email y el estado del chechbox
    localStorage.setItem("emailAdmin", emailInput.value.trim());
    localStorage.setItem("checked", "true");
  }else{
    localStorage.removeItem("emailAdmin");
    localStorage.removeItem("checked");
  }
}

/*-------------------------------------------------
Recuperar email en el login
-------------------------------------------------*/
function getEmail(){
  const emailStored = localStorage.getItem("emailAdmin");
  const rememberState = localStorage.getItem("checked");

  if(emailStored){
    document.querySelector('[name=emailAdmin]').value = emailStored;
  }

  if(rememberState){
    document.querySelector('#remember').checked = true;
  }
}

getEmail()