<?php
    session_start();
    if((!isset($_SESSION["logged"]))||($_SESSION["logged"]=false)){
        $_SESSION["e_login"] = "Musisz byc zalogowany";
        header('Location: '.$_SESSION["article_url"]);
        exit();
    }
?>

<html lang="pl">
    <head>
        <title>Gejonet.pl</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    if(isset($_SESSION["logged"])) {
        echo "<div class='account'>";
        echo $_SESSION["user_name"];
        echo "  <a href='logout.php'>Wyloguj sie</a>";
        echo "</div>";
    }
    ?>
        <div class="container">
            <div class="article"><a href="article1.php">Artykul 1</a></div>
            <div class="article"><a href="article2.php">Artykul 2</a></div>
            <div class="article"><a href="article3.php">Artykul 3</a></div>
            <div class="article"><a href="article4.php">Artykul 4</a></div>
        </div>
    </body>
</html>
