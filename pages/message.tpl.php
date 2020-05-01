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
    
}else{
    echo "Hiányos adatok!";
}

?>


<form action="" method="post">
    <input type="email" name="email" id="" placeholder="E-mail cím"><br>
    <input type="checkbox" name="ishungarian" id="">
    <label for="ishungarian">Magyar</label></br>
    <textarea name="message" id="" cols="30" rows="10"></textarea></br>
    <input type="submit" value="Küldés">
</form>