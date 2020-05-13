
function band_up(){
    // remove of the buttons
    $( "#prova" ).remove();


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
        f.className = "form-form";

    //************************ creo il bottone *************************/
        /*var b_registrati = document.createElement("embed");
        b_registrati.type = "image/svg+xml";
        b_registrati.src = "/assets/Entra2.svg";
        b_registrati.style = "width: 140%;height: auto;"*/
        var hidden_b = document.createElement("input");
        hidden_b.type = "submit";
        hidden_b.name = "b_registrationButton";
        hidden_b.style = "display:none";

        var b_registrati = document.createElement("input");
        b_registrati.className = "Entra_button";
        b_registrati.type = "image";
        b_registrati.name = "b_registrationButton";
        b_registrati.src = "/assets/Rectangle 4.png";
        b_registrati.style = "width: 140%;height: auto;";
        b_registrati.onclick = function (){
            $(document).ready(function(){
                $(".form-form").submit();
                }); 
            };

    //************************ creo le label ***************************/
        //create label registrati da band
        var band = document.createElement("label");
        band.className = "login-label";
        band.innerHTML = "Registrati da Band";

        //create label nome band
        var l_nome_band = document.createElement("label");
        l_nome_band.className = "login-label-secondo";
        l_nome_band.innerHTML = "Nome Band";

        //create label email band
        var l_email = document.createElement("label");
        l_email.className = "login-label-secondo";
        l_email.innerHTML = "Email";

        //create label password band
        var l_password = document.createElement("label");
        l_password.className = "login-label-secondo";
        l_password.innerHTML = "Password";

        //create label musica preferita band
        var l_musica_p = document.createElement("label");
        l_musica_p.className = "login-label-secondo";
        l_musica_p.innerHTML = "Musica";

    //************************ creo input ***************************/
        //create input element nome
        var nome_band = document.createElement("input");
        nome_band.type = "text";
        nome_band.id = "nome";
        nome_band.name = "nome";
        nome_band.value = "";
        nome_band.className = "form-input";
        nome_band.attributes["required"] = "";

        //create input element email 
        var email = document.createElement("input");
        email.type = "html";
        email.id = "email";
        email.name = "email";
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

        //create drop down musica preferita 
        var musica_preferita = document.createElement("select");
        musica_preferita.attributes = "multiple"

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

        musica_preferita.appendChild(optionC);
        musica_preferita.appendChild(optionD);
        




    // add all elements to the form
    container.appendChild(row);
    row.appendChild(col_1);
    col_1.appendChild(band);
    col_1.appendChild(f);
    f.appendChild(l_nome_band);
    f.appendChild(nome_band);
    f.appendChild(l_email);
    f.appendChild(email);
    f.appendChild(l_password);
    f.appendChild(password);
    f.appendChild(document.createElement("br"));
    f.appendChild(l_musica_p);
    f.appendChild(document.createElement("br"));
    f.appendChild(musica_preferita);
    f.appendChild(hidden_b);
    //f.appendChild(b_registrati);
    row.appendChild(col_2);
    row.appendChild(col_3);
    col_3.appendChild(b_registrati);



    // add the form inside the body
    $("#sostituto").append(row);   //using jQuery or
    //document.getElementsByTagName('body')[0].appendChild(f); //pure javascript

}