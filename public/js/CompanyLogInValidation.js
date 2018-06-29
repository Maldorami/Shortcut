document.addEventListener('DOMContentLoaded', function()
{

 const  { CompanyLogin } = document.forms

 CompanyLogin.onsubmit = function onFormSubmit (ev)
 {
     if(!validateCompanyLogin())
     {
         ev.preventDefault()
     }
     else{
      CompanyLogin.submit()
     }

 }


   function validateCompanyLogin() // hace un llamado a todas las validaciones
   {

    var errorAlert = document.getElementsByClassName("text-danger")
    while(errorAlert.length > 0){
        errorAlert[0].parentNode.removeChild(errorAlert[0]);
    }


    const{email, password} = CompanyLogin.elements
    var errores = [];

    validateEmail(email.value, errores)
    validatePassword(password.value, errores)

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
    errores.push(["email", "Ingrese un email válido!"]);
    return false;
}


function validatePassword(password, errores)
{
  if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(password))
  {
    return true;
}
errores.push(["password", "Ingrese una contraseña válida!"]);
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