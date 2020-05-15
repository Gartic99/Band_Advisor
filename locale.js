
function locale_up(){
    // rimuovo i bottoni
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
        f.id="locale_form";
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
        /*Creo un bottone virtuale esterno e un bottone submit interno alla form,
        in questo modo potrò posizionare il bottone submit ovunque.
        Il bottone virtuale farà una jquery con la quale premerà il submit.*/
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
        tipo_locale.name="tipo_l[]";
        tipo_locale.id="tipo_l";
        tipo_locale.setAttribute("multiple","multiple");
        tipo_locale.setAttribute("size","2");
        
        var option=document.createElement("option");
        option.value= "Bar";
        option.innerHTML="Bar";

        var optionB=document.createElement("option");
        optionB.value= "Pub";
        optionB.innerHTML="Pub";

        var optionC=document.createElement("option");
        optionC.value= "Risto_Bar";
        optionC.innerHTML="Risto_bar";

        tipo_locale.appendChild(option);
        tipo_locale.appendChild(optionB);
        tipo_locale.appendChild(optionC);



        //create drop down musica preferita 
        var musica_preferita = document.createElement("select");
        musica_preferita.name="mus_pref[]";
        musica_preferita.id="mus_pref";
        musica_preferita.setAttribute("multiple","multiple");
        musica_preferita.setAttribute("size","2");

        var optionD=document.createElement("option");
        optionD.value= "Rock";
        optionD.innerHTML="Rock";

        var optionE=document.createElement("option");
        optionE.value= "Pop";
        optionE.innerHTML="Pop";

        var optionF=document.createElement("option");
        optionF.value= "Rap";
        optionF.innerHTML="Rap";

        musica_preferita.appendChild(optionD);
        musica_preferita.appendChild(optionE);
        musica_preferita.appendChild(optionF);
        
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



    // aggiungo gli elementi nel DOM
        $("#sostituto").append(row);   //uso jQuery 

}

//
function check_select(select){
    var maxOptions = 2;
    var optionCount = 0;
    for (var i = 0; i < select.length; i++) {
        if (select[i].selected) {
            optionCount++;
            if (optionCount > maxOptions) {
                alert("scegliere al massimo 2 opzioni")
                return false;
            }
        }
    }
    if (optionCount==0) return false;
    return true;
}

// script per verificare i valori della form
function validateLForm() {
    var l_email = $("#l_email").val();
    var nome = $("#nome").val();
    var password = $("password").val();

    var tipo_l = check_select($("#tipo_l"));
    var mus_pref = check_select($("#mus_pref"));
    alert(tipo_l);
    alert(mus_pref);    

    if (l_email == "" || nome == "" || password == "" || !tipo_l || !mus_pref) {
      alert("compila tutti i campi obligatori");
    }
    else{
        document.forms["locale_form"].submit();
    }
}