<?php
    function connect(){
        $db = new PDO('mysql:host=localhost; dbname=webprog', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        return $db;
    }
?>