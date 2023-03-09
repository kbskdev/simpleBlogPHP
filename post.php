<?php
    session_start();
    if((!isset($_SESSION["logged"]))||($_SESSION["logged"]=false)){
        $_SESSION["e_login"] = "Musisz byc zalogowany";
        header('Location: '.$_SESSION["article_url"]);
        exit();
    }
    require_once ("data.php");
    $article_id = $_SESSION["article_id"];
    $user_id = $_SESSION["user_id"];
    $comment_content = $_POST["comment_content"];
    $post_connection = new mysqli($host,$db_user,$db_password,$db_name);

    $post_sql = "INSERT INTO komentarze (`id_artykulu`, `id_user`, `tresc`) VALUES ($article_id, $user_id, '$comment_content')";

    if($comment_post = $post_connection->query($post_sql)){
        header ('Location: '.$_SESSION["article_url"].'');
    }
    else{
        echo "dupa";
    }
