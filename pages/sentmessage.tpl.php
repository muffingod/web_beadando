<?php

echo "<strong>E-mail: </strong>" . $_SESSION['sentmsg']['email'] . "</br>";
echo "<strong>Magyar: </strong>";
if($_SESSION['sentmsg']['ishungarian'] == 1){
    echo "Igen </br>";
}else {
    echo "Nem </br>";
}

echo "<strong>Üzenet: </strong>" . $_SESSION['sentmsg']['message'] . "</br>";

if(isset($_POST['ok'])){
    header('Location: ./');
}

?>


<form action="" method="post">
    <input type="hidden" name="ok">
    <input type="submit" value="OK">
</form>