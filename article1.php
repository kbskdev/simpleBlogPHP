<?php
    session_start();
    $article_id = 1;
    $_SESSION["article_id"]=1;
    $_SESSION["article_url"]="article1.php";
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
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut libero iaculis, dignissim erat tempor, cursus tortor. Nunc at odio sed ligula viverra dictum eget ac nunc. Aenean cursus, purus ac venenatis accumsan, nulla tellus congue orci, non facilisis lorem libero sed dui. Proin nec accumsan quam. Nam a sagittis massa. Vestibulum at felis nec lacus efficitur sollicitudin vitae at erat. Vivamus nisi elit, vestibulum quis enim vitae, mollis molestie neque. Sed eget tortor iaculis nisl gravida sodales.
                <br><br><br>
                Maecenas faucibus felis eget faucibus volutpat. Nullam id placerat diam. Integer fringilla mi risus, ac ornare enim ullamcorper at. Nam viverra ac ex eget consequat. Suspendisse eu enim in nulla sodales faucibus vel eget nisl. Ut in gravida nibh, in faucibus mi. Pellentesque dapibus nunc sit amet urna iaculis tempus. Curabitur sodales augue ut ante gravida placerat. Donec sodales enim bibendum sapien facilisis, eget auctor dui sagittis. Nunc faucibus lorem nec lorem tempor malesuada. Fusce ut ligula ligula. Donec rutrum, felis non dapibus porttitor, justo enim efficitur tellus, tristique aliquam tellus lacus in magna. Sed arcu orci, vulputate quis efficitur euismod, suscipit sed enim. Nunc id suscipit sapien. Nullam felis eros, tincidunt vel justo vel, bibendum tristique nisl.
                <br><br><br>
                Vestibulum fringilla mattis dolor. Integer dapibus augue non risus lacinia, vel commodo erat rutrum. Nam tincidunt lorem id nulla faucibus faucibus sed vel ante. Pellentesque lorem turpis, imperdiet non convallis et, bibendum id dolor. Praesent blandit tempus erat, quis dignissim tellus eleifend viverra. Curabitur lobortis, dui in sagittis pulvinar, arcu nisl bibendum tellus, nec porta lectus leo at mi. Aliquam a mi at diam convallis eleifend. Nulla lobortis, tortor nec efficitur iaculis, ante nibh suscipit eros, non laoreet mauris lacus eget lectus. Maecenas ultrices sollicitudin dictum. Maecenas eu auctor erat.
                <br><br><br>
                In in laoreet arcu. Nam elementum ultrices orci vel faucibus. Nunc finibus libero vitae commodo molestie. Nam auctor quam sed velit dignissim semper. Aenean bibendum ligula dolor, vel malesuada magna tempor posuere. Cras id lectus vitae sapien porttitor tempor. Cras aliquet diam interdum diam dictum lacinia. Sed in justo eu ligula bibendum suscipit. Nulla vel gravida arcu, sit amet luctus libero. Ut at nisl interdum, varius nibh eget, condimentum nisi. Donec quis massa at neque feugiat lobortis id ut diam. Aenean faucibus tristique mattis. Nulla ultrices porttitor mi, non porta neque vulputate nec. Phasellus nec felis magna. Pellentesque vel condimentum libero. Quisque pulvinar velit id imperdiet ultrices.</div>
            <div class="comment_section">
                <div class="upload_comment">
                    <form method="post" action="post.php">
                        <input type="text" name="comment_content">
                        <input type="submit" value="opublikuj"><br>
                        <?php
                        if(isset($_SESSION["e_login"])){
                            echo $_SESSION["e_login"];
                            unset($_SESSION["e_login"]);
                        }
                        ?>
                    </form>

                </div>
                <?php
                require_once ("data.php");
                $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
                    $sql_show_comments = "SELECT tresc FROM komentarze WHERE id_artykulu=$article_id";
                    $zapytanie = $polaczenie->query($sql_show_comments);
                    while($komentarz = $zapytanie->fetch_assoc()){
                        echo '<div class="comment">'.$komentarz["tresc"].'</div>';
                        echo "<br>";
                    }
                ?>


            </div>
        </div>
    </body>
</html>