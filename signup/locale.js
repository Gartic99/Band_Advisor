
function locale_up(){
    // rimuovo i bottoni
    $( "#dynamic" ).remove();


    //************************ creo tutti le rows e cols ***************/
        // creo il container
        var container = document.createElement("container");
        container.id="cont";
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
        
        var col_4 = document.createElement("div");
        col_4.className = "col-12";
        col_4.style = "height: 2vh;";

        //create a form
        var f = document.createElement("form");
        f.className = "form-form";
        f.action="/signup/signup.php";
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
        l_registrati.src = "//assets/Entra2.svg";
        l_registrati.style = "width: 140%;height: auto;"*/
        /*Creo un bottone virtuale esterno e un bottone submit interno alla form,
        in questo modo potrò posizionare il bottone submit ovunque.
        Il bottone virtuale farà una jquery con la quale premerà il submit.*/
        var hidden_b = document.createElement("input");
        hidden_b.type = "submit";
        hidden_b.name = "l_registrationButton";
        hidden_b.style = "display:none";


        var l_registrati = document.createElement("button");
        l_registrati.className = "btn btn-danger mr-sm-2 entra";
        l_registrati.type = "button";
        l_registrati.style = "width: 140%;height: auto;";
        l_registrati.innerHTML="Registrati"
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


        //create label email locale
        var l_email2 = document.createElement("label");
        l_email2.className = "login-label-secondo";
        l_email2.innerHTML = "Conferma Email";

        //create label password locale
        var l_password = document.createElement("label");
        l_password.className = "login-label-secondo";
        l_password.innerHTML = "Password";

        //create label password locale
        var l_password2 = document.createElement("label");
        l_password2.className = "login-label-secondo";
        l_password2.innerHTML = " Conferma Password";

        //create labelt ip locale
        var l_tipo_locale = document.createElement("label");
        l_tipo_locale.className = "login-label-secondo";
        l_tipo_locale.innerHTML = "Tipo Locale";

        //create label musica preferita locale
        var l_musica_p = document.createElement("label");
        l_musica_p.className = "login-label-secondo";
        l_musica_p.innerHTML = "Musica Preferita (Fino a due scelte)";
        l_musica_p.style.padding="5%";

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
        email.type = "email";
        email.id = "email";
        email.name = "l_email";
        email.value = "";
        email.className = "form-input";    

        //create input element email 
        var email2 = document.createElement("input");
        email2.type = "email";
        email2.id = "email2";
        email2.name = "l_email2";
        email2.value = "";
        email2.className = "form-input";

        //create input element password
        var password = document.createElement("input");
        password.type = "password";
        password.id = "password";
        password.name = "password";
        password.value = "";
        password.className = "form-input";
        

        //create input element password
        var password2 = document.createElement("input");
        password2.type = "password";
        password2.id = "password2";
        password2.name = "password2";
        password2.value = "";
        password2.className = "form-input";
    //************************ creo input ***************************/

        //create drop down tipo locale 
        var tipo_locale = document.createElement("select");
        tipo_locale.name="tipo_l[]";
        tipo_locale.id="tipo_l";
        $(document).ready(function(){
            $("#tipo_l").selectpicker();
        })
        tipo_locale.setAttribute("multiple", "multiple");
        tipo_locale.setAttribute("data-live-search","true");
        tipo_locale.setAttribute("title","imposta il tipo di locale");
        tipo_locale.setAttribute("data-size","5");

        
        var option1=document.createElement("option");
        option1.value= "Bar";
        option1.innerHTML="Bar";

        var option2=document.createElement("option");
        option2.value= "Pub";
        option2.innerHTML="Pub";

        var option3=document.createElement("option");
        option3.value= "Risto Bar";
        option3.innerHTML="Risto bar";

        var option4=document.createElement("option");
        option4.value= "Ristorante";
        option4.innerHTML="Ristorante";
        
        var option5=document.createElement("option");
        option5.value= "Trattoria";
        option5.innerHTML="Trattoria";

        var option6=document.createElement("option");
        option6.value= "Pizzeria";
        option6.innerHTML="Pizzeria";

        var option7=document.createElement("option");
        option7.value= "Enoteca";
        option7.innerHTML="Enoteca";

        var option8=document.createElement("option");
        option8.value= "Lounge Bar";
        option8.innerHTML="Lounge Bar";

        var option9=document.createElement("option");
        option9.value= "Birreria";
        option9.innerHTML="Birreria";

        var option10=document.createElement("option");
        option10.value= "Caffetteria";
        option10.innerHTML="Caffetteria";

        var option11=document.createElement("option");
        option11.value= "Discoteca";
        option11.innerHTML="Discoteca";

        var option12=document.createElement("option");
        option12.value= "Sala da ballo";
        option12.innerHTML="Sala da ballo";

        var option13=document.createElement("option");
        option13.value= "Stabilimento Balneare";
        option13.innerHTML="Stabilimento Balneare";

        var option14=document.createElement("option");
        option14.value= "Sala concerti";
        option14.innerHTML="Sala concerti";

        tipo_locale.appendChild(option1);
        tipo_locale.appendChild(option2);
        tipo_locale.appendChild(option3);
        tipo_locale.appendChild(option4);
        tipo_locale.appendChild(option5);
        tipo_locale.appendChild(option6);
        tipo_locale.appendChild(option7);
        tipo_locale.appendChild(option8);
        tipo_locale.appendChild(option9);
        tipo_locale.appendChild(option10);
        tipo_locale.appendChild(option11);
        tipo_locale.appendChild(option12);
        tipo_locale.appendChild(option13);
        tipo_locale.appendChild(option14);



        //create drop down musica preferita 
        var musica_preferita = document.createElement("select");
        musica_preferita.name="mus_pref[]";
        musica_preferita.id="mus_pref";
        $(document).ready(function(){
            $("#mus_pref").selectpicker();
        })
        musica_preferita.setAttribute("multiple", "multiple");
        musica_preferita.setAttribute("data-live-search","true");
        musica_preferita.setAttribute("title","genere che preferisci");
        musica_preferita.setAttribute("data-size","5");

        var optionC=document.createElement("option");
        optionC.value= "Rock";
        optionC.innerHTML="Rock";

        var optionD=document.createElement("option");
        optionD.value= "Pop";
        optionD.innerHTML="Pop";

        var optionE=document.createElement("option");
        optionE.value= "Rap";
        optionE.innerHTML="Rap";

        var optionF=document.createElement("option");
        optionF.value= "Jazz";
        optionF.innerHTML="Jazz";

        var optionG=document.createElement("option");
        optionG.value= "Blues";
        optionG.innerHTML="Blues";

        var optionH=document.createElement("option");
        optionH.value= "Metal";
        optionH.innerHTML="Metal";

        var optionI=document.createElement("option");
        optionI.value= "Elettronica";
        optionI.innerHTML="Elettronica";

        var optionJ=document.createElement("option");
        optionJ.value= "Trap";
        optionJ.innerHTML="Trap";

        var optionK=document.createElement("option");
        optionK.value= "Folk";
        optionK.innerHTML="Folk";

        var optionL=document.createElement("option");
        optionL.value= "Funk";
        optionL.innerHTML="Funk";

        var optionM=document.createElement("option");
        optionM.value= "Gospel";
        optionM.innerHTML="Gospel";

        var optionN=document.createElement("option");
        optionN.value= "House";
        optionN.innerHTML="House";

        var optionO=document.createElement("option");  
        optionO.value= "Hip-Hop";
        optionO.innerHTML="Hip-Hop";

        var optionP=document.createElement("option");
        optionP.value= "Techno";
        optionP.innerHTML="Techno";

        var optionQ=document.createElement("option");
        optionQ.value= "R&B";
        optionQ.innerHTML="R&B";

        var optionR=document.createElement("option");
        optionR.value= "Dance";
        optionR.innerHTML="Dance";

        var optionS=document.createElement("option");
        optionS.value= "Punk";
        optionS.innerHTML="Punk";
        
        var optionT=document.createElement("option");
        optionT.value= "Reggaeton";
        optionT.innerHTML="Reggaeton";

        var optionU=document.createElement("option");
        optionU.value= "Reggae";
        optionU.innerHTML="Reggae";

        var optionV=document.createElement("option");
        optionV.value= "Alternative";
        optionV.innerHTML="Alternative";

        var optionV=document.createElement("option");
        optionV.value= "Classica";
        optionV.innerHTML="Classica";

        var optionX=document.createElement("option");
        optionX.value= "Indie";
        optionX.innerHTML="Indie";

        var optionY=document.createElement("option");
        optionY.value= "Disco";
        optionY.innerHTML="Disco";

         musica_preferita.appendChild(optionC);
         musica_preferita.appendChild(optionD);
         musica_preferita.appendChild(optionE);
         musica_preferita.appendChild(optionF);
         musica_preferita.appendChild(optionG);
         musica_preferita.appendChild(optionH);
         musica_preferita.appendChild(optionI);
         musica_preferita.appendChild(optionJ);
         musica_preferita.appendChild(optionK);
         musica_preferita.appendChild(optionL);
         musica_preferita.appendChild(optionM);
         musica_preferita.appendChild(optionN);
         musica_preferita.appendChild(optionO);
         musica_preferita.appendChild(optionP);
         musica_preferita.appendChild(optionQ);
         musica_preferita.appendChild(optionR);
         musica_preferita.appendChild(optionS);
         musica_preferita.appendChild(optionT);
         musica_preferita.appendChild(optionU);
         musica_preferita.appendChild(optionV);
         musica_preferita.appendChild(optionX);
         musica_preferita.appendChild(optionY);


        musica_preferita.appendChild(optionD);
        musica_preferita.appendChild(optionE);
        musica_preferita.appendChild(optionF);
        
    // add all elements to the form
        
        f.appendChild(l_nome_locale);
        f.appendChild(document.createElement("br"));
        f.appendChild(nome_locale);
        f.appendChild(document.createElement("br"));
        f.appendChild(l_email);
        f.appendChild(document.createElement("br"));
        f.appendChild(email);
        f.appendChild(document.createElement("br"));
        f.appendChild(l_email2);
        f.appendChild(document.createElement("br"));
        f.appendChild(email2);
        f.appendChild(document.createElement("br"));
        f.appendChild(l_password);
        f.appendChild(document.createElement("br"));
        f.appendChild(password);
        f.appendChild(l_password2);
        f.appendChild(document.createElement("br"));
        f.appendChild(password2);
        f.appendChild(document.createElement("br"));
        f.appendChild(l_tipo_locale);
        f.appendChild(document.createElement("br"));
        f.appendChild(tipo_locale);
        f.appendChild(document.createElement("br"));
        f.appendChild(l_musica_p);
        f.appendChild(document.createElement("br"));
        f.appendChild(musica_preferita);
        f.appendChild(hidden_b);
        //row.appendChild(col_4);
        col_1.appendChild(locale);
        col_1.appendChild(f);
        col_3.appendChild(l_registrati);
        row.appendChild(col_1);
        row.appendChild(col_2);
        row.appendChild(col_3);
       
        container.appendChild(row);
       



    // aggiungo gli elementi nel DOM
        $("#sostituto").append(container);   //uso jQuery 
        //tentativi di modal
        
       

}


// script per verificare i valori della form
function validateLForm() {
    var l_email = $("#email").val();
    var l_email2 = $("#email2").val();
    var nome = $("#nome").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();
    
    var tipo_l = $("#tipo_l").val().length;
    var mus_pref = $("#mus_pref").val().length;   
    if (tipo_l>2 || mus_pref>2) alert("al massimo 2 generi musicali o tipo locale");

    else if (l_email == "" || nome == "" || password == "" || password2 == "" || tipo_l<1||mus_pref<1) {
      alert("compila tutti i campi obligatori");
    }
    else if(!(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32}$/.test(password))){
        alert("La password deve contenere almeno 8 caratteri alfanumerici di cui almeno uno maiuscolo, uno minuscolo")
    }
    else if (password.localeCompare(password2)!=0){
        alert("le due password sono diverse");
    }
    else if (l_email2.localeCompare(l_email)!=0){
        alert("le due email sono diverse");
    }
    else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(l_email))){
        alert("non hai immesso una email");
    }
    else{
        var frm = $('#locale_form');
        //document.forms["locale_form"].submit();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                $('.modal-body').append(document.createElement("p").innerHTML = data);
                $('#myModal').modal('show');
                console.log(data);
            },
            error: function (data) {
                $('.modal-body').append(document.createElement("p").innerHTML = data);
                $(".modal-body").css('background', 'red');
                $('#myModal').modal('show');
                console.log(data);
            },
        });
    }
}
