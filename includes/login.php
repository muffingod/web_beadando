<?php
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

?>