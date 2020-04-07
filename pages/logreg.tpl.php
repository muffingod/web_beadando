<?php
    include("includes/database.php");
    $db = connect();
    if(isset($_POST['login'])){

    if($_POST['username'] != null && $_POST['password'] != null){

            $hash=sha1($_POST['password']);
            $row=$db->query("SELECT firstname, lastname, username from users where password='$hash';")->fetch(PDO::FETCH_ASSOC);

            if($row!=null){
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                echo "Sikeres bejelentkezés!";
                header('Location: ./');
            }else{
                echo "Nincs ilyen felhasználó!";
            }

        }

    }

    if(isset($_POST['registration'])){
        if($_POST['username']!=null && $_POST['password']!=null && $_POST['firstname']!=null && $_POST['lastname']!=null){
            
            
            $hash = sha1($_POST['password']);
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];

            $row=$db->query("SELECT firstname from users where username='$username';")->fetch(PDO::FETCH_ASSOC);
            if($row!=null){
                echo "A felhasználónév foglalt!";
            }else{
                $sql = "INSERT INTO users(firstname, lastname, username, password)
                VALUES ('$firstname', '$lastname', '$username', '$hash');";

                $db->prepare($sql)->execute();
                echo "Sikeres regisztráció!";
            }


            
        }

    }
?>

<div id="content">
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
        <input type="text" name="firstname" id="" placeholder="Családi név"><br>
        <input type="text" name="lastname" id="" placeholder="Utónév"><br>
        <input type="password" name="password" id="" placeholder="Jelszó"><br>
        <input type="submit" value="Regisztráció">
        <input type="hidden" name="registration">
    </form>
</div>