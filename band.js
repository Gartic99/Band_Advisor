
function band_up(){
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

        //creo a form
        var f = document.createElement("form");
        f.className = "form-form";
        f.action="signup.php";
        f.method="post";
        f.name="band_form";
        f.id="band_form"; 
        f.onsubmit = function (event){
            $(document).ready(function(){
                validateForm();
            }); 
            event.preventDefault();
        };

    //************************ creo il bottone *************************/
        /*var b_registrati = document.createElement("embed");
        b_registrati.type = "image/svg+xml";
        b_registrati.src = "/assets/Entra2.svg";
        b_registrati.style = "width: 140%;height: auto;"*/

        /*Creo un bottone virtuale esterno e un bottone submit interno alla form,
        in questo modo potrò posizionare il bottone submit ovunque.
        Il bottone virtuale farà una jquery con la quale premerà il submit.*/
        var hidden_b = document.createElement("input");
        hidden_b.type = "submit";
        hidden_b.style = "display:none";

        var b_registrati = document.createElement("input");
        b_registrati.className = "Entra_button";
        b_registrati.type = "image";
        b_registrati.src = "/assets/Rectangle 4.png";
        b_registrati.style = "width: 140%;height: auto;";
        b_registrati.onclick = function (){
            $(document).ready(function(){
                $(".form-form").submit();
                }); 
            };

    //************************ creo le label ***************************/
        //creo label registrati da band
        var band = document.createElement("label");
        band.className = "login-label";
        band.innerHTML = "Registrati da Band";

        //creo label nome band
        var l_nome_band = document.createElement("label");
        l_nome_band.className = "login-label-secondo";
        l_nome_band.innerHTML = "Nome Band";

        //creo label email band
        var l_email = document.createElement("label");
        l_email.className = "login-label-secondo";
        l_email.innerHTML = "Email";

        //creo label password band
        var l_password = document.createElement("label");
        l_password.className = "login-label-secondo";
        l_password.innerHTML = "Password";

        //creo label musica preferita band
        var l_musica_p = document.createElement("label");
        l_musica_p.className = "login-label-secondo";
        l_musica_p.innerHTML = "Musica";

    //************************ creo input ***************************/
        //creo input element nome
        var nome_band = document.createElement("input");
        nome_band.type = "text";
        nome_band.id = "nome";
        nome_band.name = "nome";
        nome_band.value = "";
        nome_band.className = "form-input";

        //creo input element email 
        var email = document.createElement("input");
        email.type = "html";
        email.id = "email";
        email.name = "b_email";
        email.value = "";
        email.className = "form-input";

        //creo input element password
        var password = document.createElement("input");
        password.type = "password";
        password.id = "password";
        password.name = "password";
        password.value = "";
        password.className = "form-input";

    //************************ creo input ***************************/

        //creo drop down musica preferita 
        var genere = document.createElement("select");
        genere.name="genere[]";
        genere.id="genere";
        $(document).ready(function(){
            $("#genere").selectpicker();
        })
        genere.setAttribute("multiple", "multiple");
        genere.setAttribute("data-live-search","true");
        genere.setAttribute("data-max-options","2");
        genere.setAttribute("title","imposta il tuo genere musicale");
        

        var optionC=document.createElement("option");
        //option.className="selectpicker";
        optionC.value= "Rock";
        optionC.innerHTML="Rock";
        //$(option).selectpicker();

        var optionD=document.createElement("option");
        //option.className="selectpicker";
        optionD.value= "Pop";
        optionD.innerHTML="Pop";

        var optionE=document.createElement("option");
        //option.className="selectpicker";
        optionE.value= "Rap";
        optionE.innerHTML="Rap";

        genere.appendChild(optionC);
        genere.appendChild(optionD);
        genere.appendChild(optionE);
        
        




    // aggiungo tutti gli elementi alla form
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
    f.appendChild(genere);
    f.appendChild(hidden_b);
    //f.appendChild(b_registrati);
    row.appendChild(col_2);
    row.appendChild(col_3);
    col_3.appendChild(b_registrati);

   
    // aggiungo la form dentro il body
    $("#sostituto").append(row);   //using jQuery

    
    

}

// script per verificare i valori della form
function validateForm() {
    var b_email = $("#b_email").val();
    var nome = $("#nome").val();
    var password = $("password").val();
    if (b_email == "" || nome == "" || password == "") {
      alert("compila tutti i campi obligatori");
      //return false;
    }
    else{
        document.forms["band_form"].submit();
    }
}