
function locale_up(){
    // remove of the buttons
    $( "#dynamic" ).remove();


    //************************ creo tutti le rows e cols ***************/
        // creo il container
        var container = document.createElement("container");
        // creo la row
        var row = document.createElement("div");
        row.className = "row";

        var row_1 = document.createElement("div");
        row_1.className = "row";

        // creo la col
        var col_1 = document.createElement("div");
        col_1.className = "col-6";
        
        var col_2 = document.createElement("div");
        col_2.className = "col-8"

        var col_3 = document.createElement("div");
        col_3.className = "col-5 col-md-3"

        //create a form
        var f = document.createElement("form");
        f.className = "form-form";
        f.action="signup.php";
        f.method="post";
        f.name="locale_form";
        f.onsubmit = function (event){
            $(document).ready(function(){
                validateLForm()
            }); 
            event.preventDefault();
        };

    //************************ creo il bottone *************************/
        /*var l_registrati = document.createElement("embed");
        l_registrati.type = "image/svg+xml";
        l_registrati.src = "/assets/Entra2.svg";
        l_registrati.style = "width: 140%;height: auto;"*/
        var hidden_b = document.createElement("input");
        hidden_b.type = "submit";
        hidden_b.name = "l_registrationButton";
        hidden_b.style = "display:none";


        var l_registrati = document.createElement("input");
        l_registrati.className = "Entra_button";
        l_registrati.type = "image";
        l_registrati.name = "l_registrationButton"
        l_registrati.src = "/assets/Rectangle 4.png";
        l_registrati.style = "width: 140%;height: auto;";
        l_registrati.onclick = function (){
            $(document).ready(function(){
                $(".form-form").submit();
                }); 
            };


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
        l_musica_p.innerHTML = "Musica Preferita";

    //************************ creo input ***************************/
        //create input element nome
        var nome_locale = document.createElement("input");
        nome_locale.type = "text";
        nome_locale.id = "nome";
        nome_locale.name = "nome";
        nome_locale.value = "";
        nome_locale.className = "form-input";
        nome_locale.setAttribute("required", "");
        nome_locale.required = true;    

        //create input element email 
        var email = document.createElement("input");
        email.type = "html";
        email.id = "email";
        email.name = "l_email";
        email.value = "";
        email.className = "form-input";
        email.attributes["required"] = "";

        //create input element password
        var password = document.createElement("input");
        password.type = "password";
        password.id = "password";
        password.name = "password";
        password.value = "";
        password.className = "form-input";
        password.attributes["required"] = "";

    //************************ creo input ***************************/

        //create drop down tipo locale 
        var tipo_locale = document.createElement("select");
        tipo_locale.attributes = "multiple";
        
        var option=document.createElement("option");
        //option.className="selectpicker";
        option.value= "Bar";
        option.innerHTML="Bar";
        //$(option).selectpicker();

        var optionB=document.createElement("option");
        //option.className="selectpicker";
        optionB.value= "Pub";
        optionB.innerHTML="Pub";
        //$(option).selectpicker();

        tipo_locale.appendChild(option);
        tipo_locale.appendChild(optionB);



        //create drop down musica preferita 
        var musica_preferita = document.createElement("select");
        musica_preferita.attributes = "multiple";

        var optionC=document.createElement("option");
        //option.className="selectpicker";
        optionC.value= "Rock";
        optionC.innerHTML="Rock";
        //$(option).selectpicker();

        var optionD=document.createElement("option");
        //option.className="selectpicker";
        optionD.value= "Pop";
        optionD.innerHTML="Pop";
        //$(option).selectpicker();
        
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
        f.appendChild(document.createElement("br"));
        f.appendChild(tipo_locale);
        f.appendChild(document.createElement("br"));
        f.appendChild(l_musica_p);
        f.appendChild(document.createElement("br"));
        f.appendChild(musica_preferita);
        f.appendChild(hidden_b);
        row.appendChild(col_2);
        row.appendChild(col_3);
        col_3.appendChild(l_registrati);



    // add the form inside the body
        $("#sostituto").append(row);   //using jQuery or
    //document.getElementsByTagName('body')[0].appendChild(f); //pure javascript

}
function validateLForm() {
    var l_email = document.forms["locale_form"]["l_email"].value;
    var nome = document.forms["locale_form"]["nome"].value;
    var password = document.forms["locale_form"]["password"].value;
    if (l_email == "" || nome == "" || password == "") {
      alert("compila tutti i campi obligatori");
      //return false;
    }
    else{
        document.forms["locale_form"].submit();
    }
}