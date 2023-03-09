<?php
session_start();
if(isset($_SESSION["logged"])){
    header('Location: mainpage.php');
    exit();
}
?>
<html lang="pl">
    <head>
        <title>Gejonet.pl</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
        <div id="login">
            <form method="post" action="login.php">
                <label>Podaj nick:<br><input type="text" name="l_nick"></label><br>
                <?php
                    if(isset($_SESSION["wrong_nick"])){
                        echo $_SESSION["wrong_nick"];
                        unset($_SESSION["wrong_nick"]);
                    }
                ?>
                <br>
                <label>Podaj haslo:<br><input type="password" name="l_password"></label><br>
                <?php
                if(isset($_SESSION["wrong_password"])){
                    echo $_SESSION["wrong_password"];
                    unset($_SESSION["wrong_password"]);
                }
                ?>
                <br>
                <input type="submit" value="zaloguj sie">
            </form>
        </div>
        <div class="articles">
            <div class="article"><a href="article1.php">Artykul 1</a></div>
            <div class="article"><a href="article2.php">Artykul 2</a></div>
            <div class="article"><a href="article3.php">Artykul 3</a></div>
            <div class="article"><a href="article4.php">Artykul 4</a></div>
        </div>
    </div>
    </body>
</html>