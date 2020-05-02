

function locale_up(){
    
    var script = document.createElement('script');
 
    script.src = '//code.jquery.com/jquery-1.11.0.min.js';
    document.getElementsByTagName('head')[0].appendChild(script);
    // remove of the buttons
    $( "#prova" ).remove();

    
    // creo il container
    var container = document.createElement("container");
    // creo la row
    var row = document.createElement("div");
    row.className = "row";

    // creo la col
    var col_1 = document.createElement("div");
    col_1.className = "col-6";

    //create a form
    var f = document.createElement("form");
    f.className = "form-form"

    //************************ creo le label ***************************/
        //create label registrati da locale
        var locale = document.createElement("label");
        locale.className = "login-label";
        locale.innerHTML = "Registrati da Locale"

        //create label nome locale
        var l_nome_locale = document.createElement("label");
        l_nome_locale.className = "login-label-secondo";
        l_nome_locale.innerHTML = "Nome Locale";

        //create label email locale
        var l_email = document.createElement("label");
        l_email.className = "login-label-secondo";
        l_email.innerHTML = "Email";

        //create label password locale
        var l_password = document.createElement("label");
        l_password.className = "login-label-secondo";
        l_password.innerHTML = "Password";

        //create labelt ip locale
        var l_tipo_locale = document.createElement("label");
        l_tipo_locale.className = "login-label-secondo";
        l_tipo_locale.innerHTML = "Tipo Locale";

        //create label musica preferita locale
        var l_musica_p = document.createElement("label");
        l_musica_p.className = "login-label-secondo";
        l_musica_p.innerHTML = "Musica";

    //************************ creo input ***************************/
        //create input element nome
        var nome_locale = document.createElement("input");
        nome_locale.type = "text";
        nome_locale.id = "nome";
        nome_locale.value = "";
        nome_locale.className = "form-input";

        //create input element email 
        var email = document.createElement("input");
        email.type = "html";
        email.id = "email";
        email.value = "";
        email.className = "form-input";

        //create input element password
        var password = document.createElement("input");
        password.type = "text";
        password.id = "password";
        password.value = "";
        password.className = "form-input";

    //************************ creo input ***************************/

        //create drop down tipo locale 
        var tipo_locale = document.createElement("select");
        tipo_locale.attributes = "multiple"

        //create drop down musica preferita 
        var musica_preferita = document.createElement("select");
        tipo_locale.attributes = "multiple"




    // add all elements to the form
    container.appendChild(row);
    row.appendChild(col_1);
    col_1.appendChild(locale);
    col_1.appendChild(f);
    f.appendChild(l_nome_locale);
    f.appendChild(nome_locale);
    f.appendChild(l_email);
    f.appendChild(email);
    f.appendChild(l_password);
    f.appendChild(password);
    f.appendChild(l_tipo_locale);
    f.appendChild(tipo_locale);
    f.appendChild(document.createElement("br"));
    f.appendChild(l_musica_p);
    f.appendChild(document.createElement("br"));
    f.appendChild(musica_preferita);



    // add the form inside the body
    $("#sostituto").append(row);   //using jQuery or
    //document.getElementsByTagName('body')[0].appendChild(f); //pure javascript

}