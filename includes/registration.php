<?php
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