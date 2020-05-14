function click(){
    $(document).ready(function(){
        $(".b_submit").click(function(){
            $(".form-form").submit();
        })
    })
}
function validateForm() {
  var email = document.forms[".form-form"]["email"].value;
  if (email == "" || nome == "" || password=="") {
    alert("devi compilare tutti i campi");
    return false;
  }
}

