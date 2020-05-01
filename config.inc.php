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
        'gallery' => array(
            'file' => 'gallery',
            'text' => 'Galléria',
            'icon' => 'fa-images'
        ),
        'message' => array(
            'file' => 'message',
            'text' => 'Kapcsolat',
            'icon' => 'fa-envelope'
        ),
        'logreg' => array(
            'file' => 'logreg',
            'text' => 'Belépés',
            'icon' => 'fa-sign-in-alt'
        ),
        'logout' => array(
            'file' => 'logout',
            'text' => 'Kilépés',
            'icon' => 'fa-sign-out-alt'
        ),
        'sentmessage' => array(
            'file' => 'sentmessage',
            'text' => '',
            'icon' => ''
        )
    );

    $error_page = array(
        'file' => '404',
        'text' => 'A keresett oldal nem található!'
    );

    $FOLDER = './images/gallery/';
    $EXT = array(".jpg", ".png");
    $MEDIATYPES = array('image/jpeg', 'image/png');
    $DATEFORMAT = "Y.m.d H.i";