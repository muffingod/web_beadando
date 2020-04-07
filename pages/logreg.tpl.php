<?php
    include("includes/database.php");
    $db = connect();
    if(isset($_POST['login'])){

    if($_POST['username'] != null && $_POST['password'] != null){

            $hash=sha1($_POST['password']);
            $username=$_POST['username'];
            $row=$db->query("SELECT firstname, lastname, username, email from users where password='$hash' and username='$username';")->fetch(PDO::FETCH_ASSOC);

            if($row!=null){
                
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];

                echo "Sikeres bejelentkezés!";
                header('Location: ./');
            }else{
                echo "Nincs ilyen felhasználó!";
            }

        }else{
            echo "Hiányos adatok!";
        }

    }

    if(isset($_POST['registration'])){
        if($_POST['username']!=null && $_POST['password']!=null && $_POST['firstname']!=null && $_POST['lastname']!=null && $_POST['email']!=null){
            
            
            $hash = sha1($_POST['password']);
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];

            $row=$db->query("SELECT firstname from users where username='$username' or email='$email';")->fetch(PDO::FETCH_ASSOC);
            if($row!=null){
                echo "Ezzel az e-maillel vagy felhasználónévvel már regisztráltak!";
            }else{
                $sql = "INSERT INTO users(firstname, lastname, username, email, password)
                VALUES ('$firstname', '$lastname', '$username', '$email', '$hash');";

                $db->prepare($sql)->execute();
                echo "Sikeres regisztráció!";
            }
        }else{
            echo "Hiányos adatok!";
        }

    }
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