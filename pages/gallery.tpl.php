<?php

    $msg = array();

    if(isset($_POST['kuld'])){
        foreach ($_FILES as $fileToUpload) {
            if($fileToUpload['error'] == 4);
            elseif(!in_array($fileToUpload['type'], $MEDIATYPES)){
                $msg[] = "Nem megfelő típus: " . $fileToUpload['name'];
            }
            else{
                $destination = $FOLDER.strtolower($fileToUpload['name']);
                if(file_exists($destination)){
                    $msg[] = "Már létezik: " . $fileToUpload.name;
                }else{
                    print_r($fileToUpload);
                    move_uploaded_file($fileToUpload['tmp_name'], $destination);
                    $msg[] = "Ok: " . $fileToUpload['name'];
                }
            }
        }
    }

    $images = array();
    $reader = opendir($FOLDER);
    while(($file = readdir($reader)) !== false){
        if(is_file($FOLDER.$file)){
            $extension = strtolower(substr($file, strlen($file)-4));
            if(in_array($extension, $EXT)){
                $images[$file] = filemtime($FOLDER.$file);
            }
        }
    }
    closedir($reader);
?>
<div id="upload-form">
    <h1>Kép feltöltés:</h1>
    <?php
        if(!empty($msg)){
            echo "<ul>";
            foreach ($msg as $message ) {
                echo "<li>$message</li>";
            }
            echo "</ul>";
        }
    ?>
    <form method="POST" enctype="multipart/form-data" >
        <label for="file">Fájl: </label>
        <input type="file" id="file" name="upFile" accept="image/jpeg, image/png" required>
        <br>
        <input type="submit" value="Feltölt" name="kuld">
    </form>
</div>
<div id="gallery">
    <h1>Galéria</h1>
    <?php
        arsort($images);
        foreach($images as $file => $date){
            echo "<div class='kep'>";
            echo "<a href='$FOLDER$file'>";
            echo "<img src='$FOLDER$file' >";
            echo "</a>";
            echo "<p>Név: $file</p>";
            echo "</div>";
        }
    ?>
</div>