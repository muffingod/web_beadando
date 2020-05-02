<?php
if(@$_POST['email'] != null && @$_POST['message'] != null){
    include("includes/database.php");
    $db = connect();
    $email=@$_POST['email'];
    if(@$_POST['ishungarian'] == true){
        $ishungarian=1;
    }else $ishungarian=0;
    $message=$_POST['message'];

    if(preg_match('/^([A-Za-z0-9_∖-∖.])+\@([A-Za-z0-9_∖-∖.])+\.([A-Za-z]{2,4})$/', $email) != 0 && strlen($message) < 140){
        $sql = "INSERT INTO messages(email, location, message)
        VALUES ('$email', '$ishungarian', '$message');";

        $db->prepare($sql)->execute();
        $_SESSION['sentmsg']=array( "email" => $email, "ishungarian" => $ishungarian, "message" => $message);
        header('Location: ./?page=sentmessage');
    }    
}
?>

<script src="./includes/message_validation.js"></script>

<form action="" method="post" onsubmit="return validate();">
    <input id="email" type="email" name="email" id="" placeholder="E-mail cím"><br>
    <input type="checkbox" name="ishungarian" id="">
    <label for="ishungarian">Magyar</label></br>
    <textarea id="message" name="message" id="" cols="30" rows="10"></textarea></br>
    <input id="submit" type="submit" value="Küldés">
</form>