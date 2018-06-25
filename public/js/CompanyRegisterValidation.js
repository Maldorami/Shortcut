document.addEventListener('DOMContentLoaded', function()
{

    const  { CompanyRegister } = document.forms

    CompanyRegister.onsubmit = function onFormSubmit (ev)
    {

        if(!validateCompanyRegister())
        {
            ev.preventDefault()
        }

    }

    
    function validateCompanyRegister() // hace un llamado a todas las validaciones
    {

        const{email, company_name, password, password_confirmation} = CompanyRegister.elements
        var errores = [];

        validateEmail(email.value, errores)
        //validatePassword(password.value, errores)

        CompanyRegister.elements.email.value = errores[0][1];
        CompanyRegister.elements.email.style.border = "1px red solid";
        CompanyRegister.elements.email.style.color = "red";
        
        return false;
        /*

        ------- APPEND
        Verifican si hay errores
        Generar un DIV de error en JS para rellenar despues
        Rellenan el nuevo nodo
        Usan append para cada input y su error

        */
    }



    function validateEmail(email, errores)
    {
       if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))
       {
         return true;
     }
     errores.push(["email", "You have entered an invalid email address!"]);
     return false;
    }


});