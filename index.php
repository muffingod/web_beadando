<?php
    include("config.inc.php");
    
    session_start();

    $current = current($pages);

    if(isset($_GET['page'])){
        if(isset($pages[$_GET['page']])){
            $current = $pages[$_GET['page']];
        }else{
            $current = $error_page;
            header("HTTP/1.0 404 Not Found");
        }
    }

    include("index.tpl.php");
?>