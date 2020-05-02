<?php
if(@$_POST['email'] != null && @$_POST['message'] != null){
    include("includes/database.php");
    $db = connect();
    $email=@$_POST['email'];
    if(@$_POST['ishungarian'] == true){
        $ishungarian=1;
    }else $ishungarian=0;
    $message=$_POST['message'];
    if(strlen($message) >=140){
        echo "Max. 140 karakter lehet az üzenet!";
    }else{
        $sql = "INSERT INTO messages(email, location, message)
        VALUES ('$email', '$ishungarian', '$message');";

        $db->prepare($sql)->execute();
        $_SESSION['sentmsg']=array( "email" => $email, "ishungarian" => $ishungarian, "message" => $message);
        header('Location: ./?page=sentmessage');
    }
}
?>

<script type="text/javascript">
    function validate_email(){
        var pattern = /^([A-Za-z0-9_∖-∖.])+@([A-Za-z0-9_∖-∖.])+.([A-Za-z]{2,4})$/;
        var email=String(document.getElementById("email").value);
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
</script>

<form action="" method="post" onsubmit="return validate();">
    <input id="email" type="email" name="email" id="" placeholder="E-mail cím"><br>
    <input type="checkbox" name="ishungarian" id="">
    <label for="ishungarian">Magyar</label></br>
    <textarea id="message" name="message" id="" cols="30" rows="10"></textarea></br>
    <input id="submit" type="submit" value="Küldés">
</form>