<?php
require_once "data.php";

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
    $haslo = [];
    $rezultat = $polaczenie->query("SELECT pass FROM uzytkownicy");
    if(!$rezultat){
        throw new Exception($polaczenie->error);
    }
    while($row = $rezultat->fetch_array(MYSQLI_NUM)){
        $haslo[]=$row[0];
    }
    for($x=0;$x<$rezultat->num_rows;$x++){
        $haslo[$x] = password_hash($haslo[$x],PASSWORD_DEFAULT);
    }
    for($x=0;$x<$rezultat->num_rows;$x++){
        $d=$x+1;
        if($polaczenie->query("UPDATE uzytkownicy SET pass = '$haslo[$x]' WHERE id=$d")){
            echo "<br>";
            echo "UPDATE uzytkownicy SET pass = '$haslo[$x]' WHERE id=$d";
        }
    }