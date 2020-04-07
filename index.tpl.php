<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$header['title']?></title>
    <link rel="stylesheet" href="./styles/main.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <?php
                foreach ($pages as $url => $page ) {
                    if($page == $current){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>";
                    }
                    echo "<a class='nav-link' href='./" . ($url == '/' ? '' : '?page='.$url) . "'>";
                    echo "<i class='fas " . $page['icon'] . "'></i>";
                    echo "<span class='link-text'>";
                    echo $page['text'];
                    echo "</span>";
                    echo "</a>";
                    echo "</li>";
                }
            ?>
        </ul>
    </nav>
    <header class="main">
        <img src="./images/eddie.png" alt="Eddie logo">
        <h1>Eddie</h1>
    </header>
    <main class="main">
        <?php include("pages/{$current['file']}.tpl.php") ?>
    </main>
    <footer class="main">
        &copy;&nbsp; Copyright 2020 innobie-tech Kft.
    </footer>
</body>
</html>