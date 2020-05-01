<?php
    if(isset($_POST['login'])){

    if($_POST['username'] != null && $_POST['password'] != null){

            $hash=sha1($_POST['password']);
            $username=$_POST['username'];
            $row=$db->query("SELECT firstname, lastname, username, email from users where password='$hash' and username='$username';")->fetch(PDO::FETCH_ASSOC);

            if($row!=null){
                
                $_SESSION['user'] = $row;

                echo "Sikeres bejelentkezés!";
                header('Location: ./');
            }else{
                echo "Nincs ilyen felhasználó!";
            }

        }else{
            echo "Hiányos adatok!";
        }

    }

?>