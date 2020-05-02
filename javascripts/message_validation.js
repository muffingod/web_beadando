function validate_email(){
    var pattern = /^([A-Za-z0-9_∖-∖.])+\@([A-Za-z0-9_∖-∖.])+\.([A-Za-z]{2,4})$/;
    var email=document.getElementById("email").value;
    if(email.match(pattern) == null ){
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("message").style.borderWidth = "2px";
        return false;
    }else{
        document.getElementById("email").style.borderColor = "white";
        return true;
    }
}

function validate_message(){
    if(document.getElementById("message").value.length == 0 || document.getElementById("message").value.length >=140){
        document.getElementById("message").style.borderColor = "red";
        document.getElementById("message").style.borderWidth = "2px";
        return false;
    }else{
        document.getElementById("email").style.borderColor = "white";
        return true;
    }
}


function validate(){
    validate_email();
    validate_message();
    if(!validate_email() || !validate_message()){
        return false;
    }else{
        return true;
    }
    
}