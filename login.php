<?php
    session_start();
    if((!isset($_POST["l_nick"]))OR(!isset($_POST["l_password"]))or(isset($_SESSION["logged"]))){
        header("Location:index.php");
        exit();
    }
    $l_nick = $_POST["l_nick"];
    $l_password = $_POST["l_password"];
    require_once ("data.php");

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

    $sql_login = sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
            mysqli_real_escape_string($polaczenie,$l_nick));

    if(($logged = $polaczenie->query($sql_login))&&($logged->num_rows>0)){
        $wyniki = $logged->fetch_assoc();
        $_SESSION["h_pass"]=$wyniki["pass"];
        if(!password_verify($l_password,$_SESSION["h_pass"])){
            $_SESSION["wrong_password"]="Zle haslo";
            header("Location:index.php");
        }
        else {
            $_SESSION["user_name"]=$wyniki["user"];
            $_SESSION["user_id"]=$wyniki["id"];
            $_SESSION["logged"] = true;
            $polaczenie->close();
            header("Location:mainpage.php");
        }
    }
    else{
        $_SESSION["wrong_nick"]="Zly nick";
        header("Location:index.php");
    }