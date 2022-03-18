<?php

    setcookie('imie', $_POST["imie"], time()+86400, "/");
    setcookie('nazwisko', $_POST["nazwisko"], time()+86400, "/");
    setcookie('email', $_POST["email"], time()+86400, "/");
    setcookie('id', $_POST["id"], time()+86400, "/");

    header("Location:index.php");
?>