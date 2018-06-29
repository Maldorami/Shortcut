document.addEventListener('DOMContentLoaded', function()
{

 const  { FreelancerRegister }  = document.forms

 FreelancerRegister.onsubmit = function onFormSubmit (ev)
 {

     if(!validateFreelancerRegister())
     {
         ev.preventDefault()
     }     
     else{
      FreelancerRegister.submit()
     }

 }


   function validateFreelancerRegister() // hace un llamado a todas las validaciones
   {

    var errorAlert = document.getElementsByClassName("text-danger")
    while(errorAlert.length > 0){
        errorAlert[0].parentNode.removeChild(errorAlert[0]);
    }


    const{email, first_name, last_name, password, password_confirmation} = FreelancerRegister.elements
    var errores = [];

    validateEmail(email.value, errores)
    validatePassword(password.value, errores)
    validateRepeatPassword(password_confirmation.value, password.value, errores)
    //validateName(first_name.value, errores)
    //validateLastName(last_name.value, errores)


       
       errores.forEach(function(elemento) {
         var input = document.querySelector('[name=' + elemento[0] + ']');
         input.parentElement.append(generarDivError(elemento[1]))
     });

       return errores.length > 0 ? false : true;
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
  if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$/.test(first_name))
  {
    return true;
}
errores.push(["first_name", "Por favor, ingrése un nombre correcto."]);
return false;
}

function validateLastName(last_name, errores)
{
  if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$/.test(last_name))
  {
    return true;
}
errores.push(["last_name", "Por favor, ingrése un apellido correcto."]);
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