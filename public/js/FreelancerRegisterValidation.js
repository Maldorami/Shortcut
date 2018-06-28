document.addEventListener('DOMContentLoaded', function()
{

 const  { FreelancerRegister } = document.forms

 CompanyRegister.onsubmit = function onFormSubmit (ev)
 {

     if(!validateCompanyRegister())
     {
         ev.preventDefault()
     }

 }


   function validateFreelancerRegister() // hace un llamado a todas las validaciones
   {

    var errorAlert = document.getElementsByClassName("text-danger")
    while(errorAlert.length > 0){
        errorAlert[0].parentNode.removeChild(errorAlert[0]);
    }


    const{email, company_name, password, password_confirmation} = CompanyRegister.elements
    var errores = [];

    validateEmail(email.value, errores)
    validatePassword(password.value, errores)
    validateRepeatPassword(password_confirmation.value, password.value, errores)

       //CompanyRegister.elements.email.value = errores[0][1];
       //CompanyRegister.elements.email.style.border = "1px red solid";
       //CompanyRegister.elements.email.style.color = "red";
       
       errores.forEach(function(elemento) {
         var input = document.querySelector('[name=' + elemento[0] + ']');
         input.parentElement.append(generarDivError(elemento[1]))
     });

       return false;
       /*

       ------- APPEND
       Verifican si hay errores
       Generar un DIV de error en JS para rellenar despues
       Rellenan el nuevo nodo
       Usan ap<pend para cada input y su error

       */
   }



   function validateEmail(email, errores)
   {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
      {
        return true;
    }
    errores.push(["email", "Email inválido!"]);
    return false;
}


function validatePassword(password, errores)
{
  if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(password))
  {
    return true;
}
errores.push(["password", "La constraseña debe tener al menos 8 caracteres, número, mayúscula y minúsculas!"]);
return false;
}

function validateRepeatPassword(password_confirmation, password, errores)
{
  if (password_confirmation == password)
  {
    return true;
}
errores.push(["password_confirmation", "Las constraseñas no coinciden!"]);
return false;
}

function validateName(first_name, errores)
{
  if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$/.test(password))
  {
    return true;
}
errores.push(["first_name", "El nombre es incorrecto!"]);
return false;
}



function generarDivError(texto) {


 var div = document.createElement('div');
 var p = document.createElement('p');
 p.innerHTML = texto;
 div.append(p);
 div.classList.add('text-danger');

 return div;
}





});