<?php
    include("includes/database.php");
    $db = connect();
    include("includes/login.php");
    include("includes/registration.php");
?>

<h2>Belépés</h2>
<form action="" method="post">
    <input type="name" name="username" id="" placeholder="Felhasználónév"><br>
    <input type="password" name="password" id="" placeholder="Jelszó"><br>
    <input type="submit" value="Belépés">
    <input type="hidden" name="login">
</form>
<h2>Regisztráció</h2>
<form action="" method="post">
    <input type="name" name="username" id="" placeholder="Felhasználónév"><br>
    <input type="email" name="email" id="" placeholder="E-mail cím"><br>
    <input type="text" name="firstname" id="" placeholder="Családi név"><br>
    <input type="text" name="lastname" id="" placeholder="Utónév"><br>
    <input type="password" name="password" id="" placeholder="Jelszó"><br>
    <input type="submit" value="Regisztráció">
    <input type="hidden" name="registration">
</form>