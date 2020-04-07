<?php
    $header = array(
        'title' => 'Eddie'
    );

    $pages = array(
        '/' => array(
            'file' => 'main',
            'text' => 'Főoldal',
            'icon' => 'fa-home'
        ),
        'about' => array(
            'file' => 'about',
            'text' => 'Rólunk',
            'icon' => 'fa-address-card'
        ),
        'connection' => array(
            'file' => 'connection',
            'text' => 'Kapcsolat',
            'icon' => 'fa-envelope'
        ),
        'logreg' => array(
            'file' => 'logreg',
            'text' => 'Belépés',
            'icon' => 'fa-sign-in-alt'
        )
    );

    $error_page = array(
        'file' => '404',
        'text' => 'A keresett oldal nem található!'
    );