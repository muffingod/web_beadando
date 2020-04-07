<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$header['title']?></title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <header>
        <h1>Eddie</h1>
    </header>
    <div id="wrapper">
        <aside id="nav">
            <nav>
                <ul>
                    <?php
                        foreach ($pages as $url => $page ) {
                            echo "<li>";
                            echo "<a href='./" . ($url == '/' ? '' : '?page='.$url) . "'>";
                            echo $page['text'];
                            echo "</a>";
                            echo "</li>";
                        }
                    ?>
                </ul>
            </nav>
        </aside>
    </div>
    <?php include("pages/{$current['file']}.tpl.php") ?>
    <footer>
        &copy;&nbsp; Copyright 2020 innobie-tech Kft.
    </footer>
</body>
</html>