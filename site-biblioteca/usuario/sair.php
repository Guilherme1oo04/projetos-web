<?php
    session_start();

    unset ($_SESSION['nome']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['email']);
    unset ($_SESSION['livroUsando']);

    header("location: index.php");
?>